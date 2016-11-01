<?php

define($VERSION, 1);

$DT_STRING = 1;
$DT_BUFFER = 2;
$DT_INT = 3;
$DT_DOUBLE = 4;
$DT_OBJECT = 5;

$MT_REGISTER = 1;
$MT_DATA = 2;
$MT_DATA_TO_SOCKET = 3;
$MT_DATA_TO_ROOM = 4;
$MT_DATA_BROADCAST = 5;
$MT_DATA_WITH_ACK = 6;
$MT_ACK = 7;
$MT_JOIN_ROOM = 8;
$MT_LEAVE_ROOM = 9;
$MT_LEAVE_ALL_ROOMS = 10;


function serialize($event, $data, $mt, $messageId) {
	if (is_string($data)) {
    	return _serialize($event, $data, $mt, $messageId, $DT_STRING);
  	}

 // if ($data instanceof pack()) {
 // 	return _serialize($event, $data, $mt, $messageId, $DT_BUFFER);
 // }


    if (is_numeric($data)) {
    	if ($data % 1 === 0) {
    		return _serialize($event, $data, $mt, $messageId, $DT_INT);
    	}
		return _serialize($event, $data, $mt, $messageId, $DT_DOUBLE);
  	}

    if (is_object($data)) {
    	return _serialize($event, json_encode($data), $mt, $messageId, $DT_OBJEC)
    }
  
    // Undefined is sent as string
  return _serialize($event, 'undefined', $mt, $messageId, $DT_STRING);
}











?>