#include<windows.h>
#include<stdio.h>
int main()
{
  HANDLE hComm;

  hComm = CreateFileA( szCOM4",
    //port name
                      GENERIC_READ|GENERIC_WRITE,  // access ( read and write)
       0,                           // (share) 0:cannot share the
                                    // COM port
       0,                           // security  (None)
       OPEN_EXISTING,               // creation : open_existing
       FILE_FLAG_OVERLAPPED,        // we want overlapped operation
       0                            // no templates file for
                                    // COM port...
       );