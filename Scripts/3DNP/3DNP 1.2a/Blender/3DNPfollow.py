# 3DNPcam
# 
# Use this script with a scene scriptlink
# Don't forget to link your Camera to an Empty with a "Track To"-Constraint

import Blender
from Blender import Scene, NMesh

import math
from math import *

scene         = Scene.GetCurrent()
context       = scene.getRenderingContext()
obj           = Blender.Object.Get("Camera")
frame         = context.currentFrame() 
camspheremesh = NMesh.GetRaw("CameraBoss") 
camsphereobj  = Blender.Object.Get('CameraBoss')
vertamount    = len(camspheremesh.verts)
size          = camsphereobj.getSize() 

if frame <= vertamount:
	vert = camspheremesh.verts[frame-1]
else:
	vert = camspheremesh.verts[vertamount]

obj.setLocation (vert.co[0]*size[0], vert.co[1]*size[1], vert.co[2]*size[2]) 