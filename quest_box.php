<?php error_reporting(-1); ?>
<?php ini_set('display_errors', true); ?>
<?php ini_set('display_startup_errors', TRUE); ?>

<div>
<img src="/logo/" alt=""/>
<br>
<input type="radio" name="r1"/
       <?php if (isset($gender) && $gender=="female") echo "checked";?>
       value="female">Female
<input type="radio" name="r1"/>
<input type="radio" name="r1"/>
<input type="radio" name="r1"/>    

</div>