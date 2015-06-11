<?php
if (LOCKDOWN) {
    echo "no you dont";
    printf("you cannot load this page directly");
    //exit("<br>you cannot load this page directly JASON!<br>);
}
echo "hello";

