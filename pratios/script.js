$(document).ready(function() {

  $("select").on('change', function() {
    if (this.closest("form").id == "r1") {countspeed1();}
    else if (this.closest("form").id == "r2") {countspeed2();}
    else if (this.closest("form").id == "r3") {countspeed3();}
    else if (this.closest("form").id == "r4") {countspeed4();}
    else if (this.closest("form").id == "r5") {countspeed5();}
    else if (this.closest("form").id == "r6") {countspeed6();}
    else if (this.closest("form").id == "r7") {countspeed7();}
    else if (this.closest("form").id == "r8") {countspeed8();}
    else if (this.closest("form").id == "r9") {countspeed9();}
    else if (this.closest("form").id == "r10") {countspeed10();}

    $("#expl" + this.closest("form").id.substring(1)).removeClass("d-none");
  });

  $("#submitter").on('click', function() {
    calculateTotal();
    $("#motors").removeClass("d-none");
    motorize();
  });

  $("#motorPicker").on('click', function() {
    motorize();
  });

  // calculate speed per motor
  function motorize()
  {
    if (document.motors.motor.options[document.motors.motor.selectedIndex].value != 0)
    {
      var params = document.motors.motor.options[document.motors.motor.selectedIndex].value.split("/");
      var speed = params[0] * document.motors.finalspeed.value;
      var torque = params[1] / document.motors.finalspeed.value;
      document.getElementById('output').innerHTML = 'Theoretical output: speed ' + Math.round(speed * 100) / 100 + ' RPM / torque '+ Math.round(torque * 100) / 100 +' N.cm';
    }
  }

  // calculate here
  function countspeed1()
  {
    if(document.r1.g1.options[document.r1.g1.selectedIndex].value > 0 && document.r1.g2.options[document.r1.g2.selectedIndex].value > 0)
    {
      var speed = document.r1.g1.options[document.r1.g1.selectedIndex].value / document.r1.g2.options[document.r1.g2.selectedIndex].value;

      if(speed > 1){
        document.r1.result.innerHTML = "Pulley ratio: 1:" + speed;
        document.r1.speed.value = speed;
        document.getElementById('expl1').innerHTML = '<strong>Explanation:</strong> this pulley ratio increases speed by ' + speed + ' times, and decreases torque by ' + speed + ' times. The follower pulley rotates ' + speed + ' times per each revolution of the driver pulley.';}
      else if(speed < 1){
        var factor = 1 / speed;
        document.getElementById('result1').innerHTML = "Pulley ratio: " + factor + ":1";
        document.r1.speed.value = speed;
        document.getElementById('expl1').innerHTML = '<strong>Explanation:</strong> this pulley ratio decreases speed by ' + factor + ' times, and increases torque by ' + factor + ' times. The follower pulley rotates ' + speed + ' times per each revolution of the driver pulley.';}
      else{
        document.getElementById('result1').innerHTML = "Pulley ratio: 1:1";
        document.r1.speed.value = speed;
        document.getElementById('expl1').innerHTML = '<strong>Explanation:</strong> this pulley ratio does not affect speed or torque. The follower pulley rotates at the exact speed of the driver pulley.';}

      if(document.motors.finalspeed.value > 0){
        document.getElementById('submitter').innerHTML = "<strong>UPDATE!</strong>"}
    }
  }

  // calculate here
  function countspeed2()
  {
    if(document.r2.g1.options[document.r2.g1.selectedIndex].value > 0 && document.r2.g2.options[document.r2.g2.selectedIndex].value > 0)
    {
      var speed = document.r2.g1.options[document.r2.g1.selectedIndex].value / document.r2.g2.options[document.r2.g2.selectedIndex].value;

      if(speed > 1){
        document.getElementById('result2').innerHTML = "Pulley ratio: 1:" + speed;
        document.r2.speed.value = speed;
        document.getElementById('expl2').innerHTML = '<strong>Explanation:</strong> this pulley ratio increases speed by ' + speed + ' times, and decreases torque by ' + speed + ' times. The follower pulley rotates ' + speed + ' times per each revolution of the driver pulley.';}
      else if(speed < 1){
        var factor = 1 / speed;
        document.getElementById('result2').innerHTML = "Pulley ratio: " + factor + ":1";
        document.r2.speed.value = speed;
        document.getElementById('expl2').innerHTML = '<strong>Explanation:</strong> this pulley ratio decreases speed by ' + factor + ' times, and increases torque by ' + factor + ' times. The follower pulley rotates ' + speed + ' times per each revolution of the driver pulley.';}
      else{
        document.getElementById('result2').innerHTML = "Pulley ratio: 1:1";
        document.r2.speed.value = speed;
        document.getElementById('expl2').innerHTML = '<strong>Explanation:</strong> this pulley ratio does not affect speed or torque. The follower pulley rotates at the exact speed of the driver pulley.';}

      if(document.motors.finalspeed.value > 0){
        document.getElementById('submitter').innerHTML = "<strong>UPDATE!</strong>"}
    }
  }

  // calculate here
  function countspeed3()
  {
    if(document.r3.g1.options[document.r3.g1.selectedIndex].value > 0 && document.r3.g2.options[document.r3.g2.selectedIndex].value > 0)
    {
      var speed = document.r3.g1.options[document.r3.g1.selectedIndex].value / document.r3.g2.options[document.r3.g2.selectedIndex].value;

      if(speed > 1){
        document.getElementById('result3').innerHTML = "Pulley ratio: 1:" + speed;
        document.r3.speed.value = speed;
        document.getElementById('expl3').innerHTML = '<strong>Explanation:</strong> this pulley ratio increases speed by ' + speed + ' times, and decreases torque by ' + speed + ' times. The follower pulley rotates ' + speed + ' times per each revolution of the driver pulley.';}
      else if(speed < 1){
        var factor = 1 / speed;
        document.getElementById('result3').innerHTML = "Pulley ratio: " + factor + ":1";
        document.r3.speed.value = speed;
        document.getElementById('expl3').innerHTML = '<strong>Explanation:</strong> this pulley ratio decreases speed by ' + factor + ' times, and increases torque by ' + factor + ' times. The follower pulley rotates ' + speed + ' times per each revolution of the driver pulley.';}
      else{
        document.getElementById('result3').innerHTML = "Pulley ratio: 1:1";
        document.r3.speed.value = speed;
        document.getElementById('expl3').innerHTML = '<strong>Explanation:</strong> this pulley ratio does not affect speed or torque. The follower pulley rotates at the exact speed of the driver pulley.';}

      if(document.motors.finalspeed.value > 0){
        document.getElementById('submitter').innerHTML = "<strong>UPDATE!</strong>"}
    }
  }

  // calculate here
  function countspeed4()
  {
    if(document.r4.g1.options[document.r4.g1.selectedIndex].value > 0 && document.r4.g2.options[document.r4.g2.selectedIndex].value > 0)
    {
      var speed = document.r4.g1.options[document.r4.g1.selectedIndex].value / document.r4.g2.options[document.r4.g2.selectedIndex].value;

      if(speed > 1){
        document.getElementById('result4').innerHTML = "Pulley ratio: 1:" + speed;
        document.r4.speed.value = speed;
        document.getElementById('expl4').innerHTML = '<strong>Explanation:</strong> this pulley ratio increases speed by ' + speed + ' times, and decreases torque by ' + speed + ' times. The follower pulley rotates ' + speed + ' times per each revolution of the driver pulley.';}
      else if(speed < 1){
        var factor = 1 / speed;
        document.getElementById('result4').innerHTML = "Pulley ratio: " + factor + ":1";
        document.r4.speed.value = speed;
        document.getElementById('expl4').innerHTML = '<strong>Explanation:</strong> this pulley ratio decreases speed by ' + factor + ' times, and increases torque by ' + factor + ' times. The follower pulley rotates ' + speed + ' times per each revolution of the driver pulley.';}
      else{
        document.getElementById('result4').innerHTML = "Pulley ratio: 1:1";
        document.r4.speed.value = speed;
        document.getElementById('expl4').innerHTML = '<strong>Explanation:</strong> this pulley ratio does not affect speed or torque. The follower pulley rotates at the exact speed of the driver pulley.';}

      if(document.motors.finalspeed.value > 0){
        document.getElementById('submitter').innerHTML = "<strong>UPDATE!</strong>"}
    }
  }

  // calculate here
  function countspeed5()
  {
    if(document.r5.g1.options[document.r5.g1.selectedIndex].value > 0 && document.r5.g2.options[document.r5.g2.selectedIndex].value > 0)
    {
      var speed = document.r5.g1.options[document.r5.g1.selectedIndex].value / document.r5.g2.options[document.r5.g2.selectedIndex].value;

      if(speed > 1){
        document.getElementById('result5').innerHTML = "Pulley ratio: 1:" + speed;
        document.r5.speed.value = speed;
        document.getElementById('expl5').innerHTML = '<strong>Explanation:</strong> this pulley ratio increases speed by ' + speed + ' times, and decreases torque by ' + speed + ' times. The follower pulley rotates ' + speed + ' times per each revolution of the driver pulley.';}
      else if(speed < 1){
        var factor = 1 / speed;
        document.getElementById('result5').innerHTML = "Pulley ratio: " + factor + ":1";
        document.r5.speed.value = speed;
        document.getElementById('expl5').innerHTML = '<strong>Explanation:</strong> this pulley ratio decreases speed by ' + factor + ' times, and increases torque by ' + factor + ' times. The follower pulley rotates ' + speed + ' times per each revolution of the driver pulley.';}
      else{
        document.getElementById('result5').innerHTML = "Pulley ratio: 1:1";
        document.r5.speed.value = speed;
        document.getElementById('expl5').innerHTML = '<strong>Explanation:</strong> this pulley ratio does not affect speed or torque. The follower pulley rotates at the exact speed of the driver pulley.';}

      if(document.motors.finalspeed.value > 0){
        document.getElementById('submitter').innerHTML = "<strong>UPDATE!</strong>"}
    }
  }

  // calculate here
  function countspeed6()
  {
    if(document.r6.g1.options[document.r6.g1.selectedIndex].value > 0 && document.r6.g2.options[document.r6.g2.selectedIndex].value > 0)
    {
      var speed = document.r6.g1.options[document.r6.g1.selectedIndex].value / document.r6.g2.options[document.r6.g2.selectedIndex].value;

      if(speed > 1){
        document.getElementById('result6').innerHTML = "Pulley ratio: 1:" + speed;
        document.r6.speed.value = speed;
        document.getElementById('expl6').innerHTML = '<strong>Explanation:</strong> this pulley ratio increases speed by ' + speed + ' times, and decreases torque by ' + speed + ' times. The follower pulley rotates ' + speed + ' times per each revolution of the driver pulley.';}
      else if(speed < 1){
        var factor = 1 / speed;
        document.getElementById('result6').innerHTML = "Pulley ratio: " + factor + ":1";
        document.r6.speed.value = speed;
        document.getElementById('expl6').innerHTML = '<strong>Explanation:</strong> this pulley ratio decreases speed by ' + factor + ' times, and increases torque by ' + factor + ' times. The follower pulley rotates ' + speed + ' times per each revolution of the driver pulley.';}
      else{
        document.getElementById('result6').innerHTML = "Pulley ratio: 1:1";
        document.r6.speed.value = speed;
        document.getElementById('expl6').innerHTML = '<strong>Explanation:</strong> this pulley ratio does not affect speed or torque. The follower pulley rotates at the exact speed of the driver pulley.';}

      if(document.motors.finalspeed.value > 0){
        document.getElementById('submitter').innerHTML = "<strong>UPDATE!</strong>"}
    }
  }

  // calculate here
  function countspeed7()
  {
    if(document.r7.g1.options[document.r7.g1.selectedIndex].value > 0 && document.r7.g2.options[document.r7.g2.selectedIndex].value > 0)
    {
      var speed = document.r7.g1.options[document.r7.g1.selectedIndex].value / document.r7.g2.options[document.r7.g2.selectedIndex].value;

      if(speed > 1){
        document.getElementById('result7').innerHTML = "Pulley ratio: 1:" + speed;
        document.r7.speed.value = speed;
        document.getElementById('expl7').innerHTML = '<strong>Explanation:</strong> this pulley ratio increases speed by ' + speed + ' times, and decreases torque by ' + speed + ' times. The follower pulley rotates ' + speed + ' times per each revolution of the driver pulley.';}
      else if(speed < 1){
        var factor = 1 / speed;
        document.getElementById('result7').innerHTML = "Pulley ratio: " + factor + ":1";
        document.r7.speed.value = speed;
        document.getElementById('expl7').innerHTML = '<strong>Explanation:</strong> this pulley ratio decreases speed by ' + factor + ' times, and increases torque by ' + factor + ' times. The follower pulley rotates ' + speed + ' times per each revolution of the driver pulley.';}
      else{
        document.getElementById('result7').innerHTML = "Pulley ratio: 1:1";
        document.r7.speed.value = speed;
        document.getElementById('expl7').innerHTML = '<strong>Explanation:</strong> this pulley ratio does not affect speed or torque. The follower pulley rotates at the exact speed of the driver pulley.';}

      if(document.motors.finalspeed.value > 0){
        document.getElementById('submitter').innerHTML = "<strong>UPDATE!</strong>"}
    }
  }

  // calculate here
  function countspeed8()
  {
    if(document.r8.g1.options[document.r8.g1.selectedIndex].value > 0 && document.r8.g2.options[document.r8.g2.selectedIndex].value > 0)
    {
      var speed = document.r8.g1.options[document.r8.g1.selectedIndex].value / document.r8.g2.options[document.r8.g2.selectedIndex].value;

      if(speed > 1){
        document.getElementById('result8').innerHTML = "Pulley ratio: 1:" + speed;
        document.r8.speed.value = speed;
        document.getElementById('expl8').innerHTML = '<strong>Explanation:</strong> this pulley ratio increases speed by ' + speed + ' times, and decreases torque by ' + speed + ' times. The follower pulley rotates ' + speed + ' times per each revolution of the driver pulley.';}
      else if(speed < 1){
        var factor = 1 / speed;
        document.getElementById('result8').innerHTML = "Pulley ratio: " + factor + ":1";
        document.r8.speed.value = speed;
        document.getElementById('expl8').innerHTML = '<strong>Explanation:</strong> this pulley ratio decreases speed by ' + factor + ' times, and increases torque by ' + factor + ' times. The follower pulley rotates ' + speed + ' times per each revolution of the driver pulley.';}
      else{
        document.getElementById('result8').innerHTML = "Pulley ratio: 1:1";
        document.r8.speed.value = speed;
        document.getElementById('expl8').innerHTML = '<strong>Explanation:</strong> this pulley ratio does not affect speed or torque. The follower pulley rotates at the exact speed of the driver pulley.';}

      if(document.motors.finalspeed.value > 0){
        document.getElementById('submitter').innerHTML = "<strong>UPDATE!</strong>"}
    }
  }

  // calculate here
  function countspeed9()
  {
    if(document.r9.g1.options[document.r9.g1.selectedIndex].value > 0 && document.r9.g2.options[document.r9.g2.selectedIndex].value > 0)
    {
      var speed = document.r9.g1.options[document.r9.g1.selectedIndex].value / document.r9.g2.options[document.r9.g2.selectedIndex].value;

      if(speed > 1){
        document.getElementById('result9').innerHTML = "Pulley ratio: 1:" + speed;
        document.r9.speed.value = speed;
        document.getElementById('expl9').innerHTML = '<strong>Explanation:</strong> this pulley ratio increases speed by ' + speed + ' times, and decreases torque by ' + speed + ' times. The follower pulley rotates ' + speed + ' times per each revolution of the driver pulley.';}
      else if(speed < 1){
        var factor = 1 / speed;
        document.getElementById('result9').innerHTML = "Pulley ratio: " + factor + ":1";
        document.r9.speed.value = speed;
        document.getElementById('expl9').innerHTML = '<strong>Explanation:</strong> this pulley ratio decreases speed by ' + factor + ' times, and increases torque by ' + factor + ' times. The follower pulley rotates ' + speed + ' times per each revolution of the driver pulley.';}
      else{
        document.getElementById('result9').innerHTML = "Pulley ratio: 1:1";
        document.r9.speed.value = speed;
        document.getElementById('expl9').innerHTML = '<strong>Explanation:</strong> this pulley ratio does not affect speed or torque. The follower pulley rotates at the exact speed of the driver pulley.';}

      if(document.motors.finalspeed.value > 0){
        document.getElementById('submitter').innerHTML = "<strong>UPDATE!</strong>"}
    }
  }

  // calculate here
  function countspeed10()
  {
    if(document.r10.g1.options[document.r10.g1.selectedIndex].value > 0 && document.r10.g2.options[document.r10.g2.selectedIndex].value > 0)
    {
      var speed = document.r10.g1.options[document.r10.g1.selectedIndex].value / document.r10.g2.options[document.r10.g2.selectedIndex].value;

      if(speed > 1){
        document.getElementById('result10').innerHTML = "Pulley ratio: 1:" + speed;
        document.r10.speed.value = speed;
        document.getElementById('expl10').innerHTML = '<strong>Explanation:</strong> this pulley ratio increases speed by ' + speed + ' times, and decreases torque by ' + speed + ' times. The follower pulley rotates ' + speed + ' times per each revolution of the driver pulley.';}
      else if(speed < 1){
        var factor = 1 / speed;
        document.getElementById('result10') = "Pulley ratio: " + factor + ":1";
        document.r10.speed.value = speed;
        document.getElementById('expl10').innerHTML = '<strong>Explanation:</strong> this pulley ratio decreases speed by ' + factor + ' times, and increases torque by ' + factor + ' times. The follower pulley rotates ' + speed + ' times per each revolution of the driver pulley.';}
      else{
        document.getElementById('result10') = "Pulley ratio: 1:1";
        document.r10.speed.value = speed;
        document.getElementById('expl10').innerHTML = '<strong>Explanation:</strong> this pulley ratio does not affect speed or torque. The follower pulley rotates at the exact speed of the driver pulley.';}

      if(document.motors.finalspeed.value > 0){
        document.getElementById('submitter').innerHTML = "<strong>UPDATE!</strong>"}
    }
  }


  // out with it
  function calculateTotal()
  {

    var fspeed = document.r1.speed.value * document.r2.speed.value * document.r3.speed.value * document.r4.speed.value * document.r5.speed.value * document.r6.speed.value * document.r7.speed.value * document.r8.speed.value * document.r9.speed.value * document.r10.speed.value;

    if(fspeed > 1){
      document.getElementById('outcome').innerHTML = "Total pulleys ratio is: 1:" + fspeed + ". This pulleys ratio increases speed by " + fspeed + " times, and decreases torque by " + fspeed + " times. The follower pulley rotates " + fspeed + " times per each revolution of the driver pulley.";}
    else if(fspeed < 1){
      var factor = 1 / fspeed;
      document.getElementById('outcome').innerHTML = "Total pulleys ratio is: " + factor + ":1. This pulleys ratio decreases speed by " + factor + " times, and increases torque by " + factor + " times. The follower pulley rotates " + fspeed + " times per each revolution of the driver pulley.";}
    else{
      document.getElementById('outcome').innerHTML = "Total pulleys ratio is: 1:1. This pulleys ratio does not affect speed or torque. The follower pulley rotates at the exact speed of the driver pulley.";}

    document.motors.finalspeed.value = fspeed;
    motorize();
    document.getElementById('submitter').innerHTML = "<strong>Calculate total ratio</strong>";
  }

});
