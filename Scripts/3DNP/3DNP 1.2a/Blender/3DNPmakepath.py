#!BPY

"""
Name: '3DNP makepath'
Blender: 237
Group: 'Wizards'
Tooltip: 'A sentence long description of what myscript does'
"""

__author__ = "Thorsten Schlüter"
__url__ = ("blender", "elysiun", "http://www.thoro.de/3DNP",)
__version__ = "1.2"
__bpydoc__ = """\Description: 3DNP creates a camera animation to produce images for 3DNP, a free JavaScript based 3D viewer 
Usage: how to use the script especially important are any keybindings that might be used, and possibly a brief description of what buttons or sliders in your gui do.
Notes: This contains any know limitations of the script
"""

# --------------------------------------------------------------------------
# Name of the Script
# --------------------------------------------------------------------------
# ***** BEGIN GPL LICENSE BLOCK *****
#
# This program is free software; you can redistribute it and/or
# modify it under the terms of the GNU General Public License
# as published by the Free Software Foundation; either version 2
# of the License, or (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software Foundation,
# Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
#
# ***** END GPL LICENCE BLOCK *****
# -------------------------------------------------------------------------- 

import Blender
from Blender import *
from Blender.BGL import *
from Blender.Draw import *
from Blender.Noise import *

import math
from math import *

print "3DNPmakepath"

# default settings, change these if you like
capbuffer = Create(2.0)
size = Create(20.0)
degrees = Create(10)
levels = Create(7)


# make one level of the sphere
def makeLevel(steps, z, width):

	for i in range(90, steps+90):
		
		winkel = i*pi/steps*2
		x = -(sin(winkel)*width)
		y = cos(winkel)*width
		v = NMesh.Vert( x , y , z ) 
		me.verts.append(v)


# make the CameraBoss
def makeCameraBoss(levels,degrees,size,capbuffer):
	global me
	total = 360/degrees*levels
	
	# get current scene and rendering context
	scene			= Blender.Scene.GetCurrent()
	rendercontext	= scene.getRenderingContext()

	# set render settings
	rendercontext.startFrame(1)
	rendercontext.endFrame(total)
	
	
	# make the sphere
	try:
		cameraboss = Blender.Object.Get('CameraBoss')
		me = NMesh.GetRaw('CameraBoss')
		wasthere = 'true'
		
	except:
		cameraboss = Blender.Object.New('Mesh')
		cameraboss.setName('CameraBoss') 
		me = NMesh.New('CameraBoss')
		wasthere = 'false'

	if wasthere == 'true':
		for v in range(0, len(me.verts)):
			me.verts.remove(me.verts[0])
			
		me.update() 
		print "old data deleted - new length:",len(me.verts)
			

	# always do this
	for m in range(0, levels):
		steps = 360/degrees
		if levels > 1:
			ystepper = ((size-capbuffer)/(levels-1))
			z = (size/2)-(capbuffer/2)-(m*ystepper)
		else:
			z=0	
		width = sqrt(((size/2)*(size/2))-(z*z))
		makeLevel (steps, z, width)
		me.update() 
	
	if wasthere != 'true':
		cameraboss.link(me)
		scene.link (cameraboss)

	Blender.Redraw()


# GUI
def draw():
	global exit, button, capbuffer, size, degrees, levels

	glClearColor(0.753, 0.753, 0.753, 0.0)
	glClear(GL_COLOR_BUFFER_BIT)

	glColor3f(0.000, 0.000, 0.000)
	glRasterPos2i(8, 187)
	Text('3DNP 1.2a  -  3DNPmakepath')

	Button('Exit', 1, 8, 11, 71, 23, 'Exit')
	Button('Start', 2, 88, 11, 95, 23, 'Create the CameraBoss')

	capbuffer = Slider('CapBuffer: ', 3, 8, 43, 175, 23, capbuffer.val, 0.5, 10.0, 0, 'The amount of space at Top/Bottom')
	size = Slider('Size: ', 4, 8, 75, 175, 23, size.val, 1.0, 200.0, 0, 'The size of the CameraBoss object')
	degrees = Slider('Degrees: ', 5, 8, 107, 175, 23, degrees.val, 1, 45, 0, 'How many degrees per step (per level)')
	levels = Slider('Levels: ', 6, 8, 139, 175, 23, levels.val, 1, 15, 0, 'The amount of levels (Y-Axis)')

def event(evt, val):
	if (evt== QKEY and not val): Exit()

def bevent(evt):
	if evt == 1: #exit
		Exit()

	elif evt == 2: #button
		makeCameraBoss(levels.val,degrees.val,size.val,capbuffer.val)
	
	Blender.Redraw()


Register(draw, event, bevent)