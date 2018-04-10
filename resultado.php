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
                      if ($_POST ["prestamo"] !="" and $_POST ["plazo"]!=""and $_POST ["cuota"]!=""and $_POST ["agregado"]!=""){
                        #funcion que calcula el interes asociado
                        # p = prestamo ; n = plazo ; c = cuota ; pr = prestamo + gastos adicionales

                        function CalCuota($p,$i,$n){
                          return $p*(((1+$i)**$n)*$i)/((1+$i)**$n - 1);
                        }
                        function IntAsociado($p,$c,$n){  #Interes asociado
                          $i1 = 0.0;
                          $i2 = 99999999999999999.0;

                          while (true){
                            $x1 = CalCuota($p,$i1,$n); #calculo de intereses predeterminados
                            $x2 = CalCuota($p,$i2,$n);
                            $mid = CalCuota($p,($i1+$i2)/2,$n);
                          #caso de menos diferencia con el interes menor
                          if ($x1 < $c and $c > $mid){
                            $i2 = ($i1+$i2)/2.0;
                            if (abs($x1-$c)<0.0000005){
                              return $i1;
                            }
                          }else{
                            $i1 = ($i1+$i2)/2.0;
                            if(abs($x2-$c)<0.0000005){
                              return $i2;
                            }
                          }
                          }
                        }
                        function CuotaReal($pr,$i,$n){
                          return $pr*$i/(1-(1+$i)**-$n);
                        }
                        function CME($cr,$n,$t){
                          $x=0;
                          for ($i = 1; $i <= $n; $i++){
                            $x += (1+$t)**-$i;
                          }
                          return $cr*$x;
                        }
                        function IntAnual($p,$cr,$n){
                          $i1 = 0.0;
                          $i2 = 99999999999999999.0;
                          while(true){
                            $x1 = CME($cr,$n,$i1);
                            $x2 = CME($cr,$n,$i2);
                            $mid = CME($cr,$n,($i1+$i2)/2);

                            if ($x1 < $c and $c > $mid){
                              $i2 = ($i1+$i2)/2.0;
                              if (abs($x1-$c)<0.0000005){
                                return $i1;
                              }
                            }else{
                              $i1 = ($i1+$i2)/2.0;
                              if (abs($x2-$c)<0.0000005){
                                return $i2;
                              }
                            }
                          }
                        }

                        function Prestamo($p,$c,$n,$g){
                          $pr = $p + $g;
                          $i = IntAsociado($p,$c,$n);
                          $cr = CuotaReal($pr,$i,$n);
                          $t = IntAnual($p,$cr,$n);
                          $CTC = $cr*$n;
                          $CAE = $t*12;
                          print "El costo total del credito tiene un valor de: $CTC
                          La carga anual equivalente (CAE) tiene un valor de: $CAE";
                        }
                        Prestamo(100000, 12, 100,0);
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
