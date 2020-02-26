
!!Make sure you have corrrect library
especially json library and NodeMCU Library


############################################ try this step first ###########################################################
//Upload NODEMCU code
//just upload the NodeMCU code to change the hotsspot name because other already code already saved inside arduino

  i-Folder /NodeMC/wifi.ino
  ii-line 33 - edit your hotspot wifi name and password 
	     - WiFiMulti.addAP("Hotspot name", "hotspot password");
	     - tool/Board pick NodeMCU
	       upload



#############################################################################################################################



########################################## if not work try this #########################################################
//Upload the code but becareful with the library
1.Upload Main code to Arduino MEGA
  i-Folder /Arduino MEGA/UNO.ino
  ii-choose Arduino MEGA inside IDE then UPLOAD

2.Upload NODEMCU code
  i-Folder /NodeMC/wifi.ino
  ii-line 33 - edit your hotspot wifi name and password 
	     - WiFiMulti.addAP("Hotspot name", "hotspot password");
	     - tool/Board pick NodeMCU
	       upload
3.For Camera 
i-Folder /Camera/Camera.ino
   i-set the board arduino UNO
   ii-OPEN serial software at /Camera/ReadSerialPortWin 


#####################################################################################################################
   iii-click check
   iv-to check camera output
   
