// 3DNP 1.2a
// Copyright (C) 2006 Thorsten Schlueter - www.thoro.de
//
// This program is free software; you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation; either version 2 of the License, or
// (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with this program; if not, write to the Free Software
// Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.


// script parameters - change these if you like

total		= 144;			// total number of images
levels		= 4;			// number of Y axis levels
startlevel	= 4;			// defines the starting axis

filemode	= 'NameNumber';		// filemode ('NameNumber'/'RowShot') - NameNumber reads a series of images filename#### (for example 0001 to 0252) / RowShot reads images in Row##shot## mode
filename	= 'frame';		// filename for images, is not used if filemode is set to 'RowShot'
suffix		= '.jpg';		// image suffix
barLength	= 164;			// defines the length of the loading bar

viewmode	= 'object';		// camera mode ('object'/'camera') 
friction	= 0.5;			// rotation friction (0 to 1)- default: 0.5
rotomatic	= 80;			// automatic rotation speed - negative or positive value, smaller values = faster rotation, 0 disables
rotoresume	= 3;			// the time in seconds 3DNP waits before resuming the autorotation, 0 disables

keycodes	= [119,100,115,97]	// keycodes for keyboard input (up,right,down,left) - default is [119,97,115,100] for 'W/D/S/A' keys, another example: [56,54,50,52] for '8/6/2/4' on num block