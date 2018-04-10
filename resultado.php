<HTML>
    <HEAD>
        <TITLE>CONSULTOR CAE</TITLE>
        <link rel="stylesheet" type="text/css" href="bootstrap.css">
        <style type="text/css">
            @media screen and (max-width: 602px){
                
                #logo{
                    margin-left: 68px;
                }
            }

            @media screen and (min-width: 603px) and (max-width: 727px){
                
                #logo{
                    margin-left: 104px;
                }
            }

            @media screen and (min-width: 728px){
                
                #logo{
                    margin-left: 150px;
                }
            }            

            @media screen and (max-width: 991px){
                
                #logo2{ 
                    text-align: center;
                }
            }
            
            #logo{
                height: 22%;
                width: 71%;
                margin-top: 33px;
            }
              

            #cae{
                margin-top: 95px;
                font-style: oblique;
                color: red;
                font-weight: bold;
                font-size: 369%;
            }

            .sub{
                font-style: oblique;
                color: red;
                font-weight: bold;
            }
            #program{
                margin-top: 100px;
            }

            .button {
                align-items: flex-start;
                text-align: center;
                cursor: default;
                color: buttontext;
                background-color: buttonface;
                box-sizing: border-box;
                padding: 2px 6px 3px;
                border-width: 2px;
                border-style: outset;
                border-color: buttonface;
                border-image: initial;
            }

        </style>
    </HEAD>

    <BODY>
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <img id="logo" align="center"; src="images/logo_udp.PNG"></img>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
            	<div id="logo2">
            	    <div class="col-xs-12 col-md-12">
                        <div id="cae">Consultor CAE</div>
                    </div>
                    <div class="col-xs-12 col-md-12">
                        <div id="project" class="sub" style="margin-right: 149px;">Proyecto TIC I - Taller Warm Up </div>
                    </div>
                    <div class="col-xs-12 col-md-12">
                        <div id="names" class="sub" style="margin-right: 38px;">Diego Far&iacuteas - Benjam&iacuten Morales - Crist&oacutebal Urra</div>
                    </div>
                    <div class="col-xs-12 4col-md-12">
                        <div id="profe" class="sub" style="margin-right: 215px";>Profesor: Jorge Elliott</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 cold-md-12">
            	<div id="program" align="center">
                    <?php
                      if ($_POST ["prestamo"] !="" and $_POST ["plazo"]!=""and $_POST ["cuota"]!=""and $_POST ["agregado"]!=""and $_POST ["plazo"]<13){
                        #funcion que calcula el interes asociado
                        # p = prestamo ; n = plazo ; c = cuota ; pr = prestamo + gastos adicionales

                        function CalCuota($p,$i,$n){
                          if ($i != 0 ){
                          return $p*(((1+$i)**$n)*$i)/(((1+$i)**$n) - 1); 
                        }else{
                          return ($p/$n);
                          }
                          }
                        function IntAsociado($p,$c,$n){  #Interes asociado
                          $i1 = 0;
                          $i2 = 0.99999;
                          $x1 = CalCuota($p,$i1,$n);
                          $x2 = CalCuota($p,$i2,$n);                        
                          $mid = CalCuota($p,($i1+$i2)/2,$n);
                          $j=0;
                          while($j<99999){
                            if ($x1 < $c and $c <= $mid){
                              $x2 = $mid;
                              $i2 = ($i1+$i2)/2;
                              $mid = Calcuota($p,($i1+$i2)/2,$n);
                              if ( $c - $x1 <0.00001){
                                return $i1;
                              }
                            }else{
                              $x1 = $mid;
                              $i1 = ($i1+$i2)/2;
                              $mid = Calcuota($p,($i1+$i2)/2,$n); 
                              if( $x2 - $c <0.00001){
                                return $i2;
                              }
                            }
                            $j++;
                          }
                        }
                        function CuotaReal($pr,$i,$n){
                          if ($i != 0 ){
                          return $pr*$i/(1-(1+$i)**-$n);
                        }else{
                          return $pr;
                          }
                        }
                       function CME($cr,$n,$t){
                          $x=0;
                          for ($i = 1; $i < $n+1; $i++){
                            $x +=  (1+$t)**(-$i);
                          }
                          return $cr*$x;
                        }


                        function IntAnual($p,$cr,$n){
                          $i1 = 0.0;
                          $i2 = 0.9999;
                          $x1 = CME($cr,$n,$i1);
                          
                          $x2 = CME($cr,$n,$i2);
                          
                          $mid = CME($cr,$n,($i1+$i2)/2);
                          $j=0;
                          while($j<9){
                            if ($x1 > $cr and $cr <= $mid){
                                $x1 = $mid;
                                $i1 = ($i1+$i2)/2;
                                $mid = CME($cr,$n,($i1+$i2)/2);
                                if ( $x1 - $cr <0.00001){
                                  return $i1;
                                }
                              }else{
                                $x2 = $mid;
                                $i2 = ($i1+$i2)/2;
                                $mid = CME($cr,$n,($i1+$i2)/2);
                                if($cr - $x2 <0.00001){
                                  return $i2;
                                }
                              }
                            }
                            $j++;
                          
                        }

                        function Prestamo($p,$c,$n,$g){
                          $prestamo = $_POST["prestamo"];
                          $pr = $p + $g;
                          $i = IntAsociado($p,$c,$n);
                          $cr = CuotaReal($pr,$i,$n);
                          $t = IntAnual($p,$cr,$n); //funcion con fallos
                          $CTC = $cr*$n;
                          $CAE = $t*12;
                          print "<p>El costo de prestamo tiene un valor de: $$prestamo<br>El costo total del credito tiene un valor de: $$CTC<br>
La carga anual equivalente (CAE) tiene un valor de: $CAE%</p>";
                        }
                        Prestamo($_POST ["prestamo"], $_POST ["cuota"],$_POST ["plazo"],$_POST ["agregado"]);
                        //print($_POST ["prestamo"]+ $_POST ["cuota"]+ $_POST ["plazo"]+$_POST ["agregado"]);
                        print ('<br /><br/><a href="index.php" class="button">Volver</a>');
                      } else {
                        print("Ingresa alg&uacute;n valor numerico valido");
                        print ('<br /><br/><a href="index.php" class="button">Volver</a>');
                      }
                    ?>
            	</div>
            </div>
        </div>
    </BODY>
</HTML>
