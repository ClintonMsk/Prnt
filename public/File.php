<?php
print_r(getallheaders());
print_r($_FILES);
copy($_FILES["File"]["tmp_name"], "Picture/Test.jpg");