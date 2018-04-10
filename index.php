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
                        <div id="project" class="sub" style="margin-right: 149px;">Proyecto TIC I - Taller Warm Up</div>
                    </div>
                    <div class="col-xs-12 col-md-12">
                        <div id="names" class="sub" style="margin-right: 38px;">Diego Far&iacuteas - Benjam&iacuten Morales - Crist&oacutebal Urra</div>
                    </div>
                    <div class="col-xs-12 col-md-12">
                        <div id="profe" class="sub" style="margin-right: 215px";>Profesor: Jorge Elliott</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 cold-md-12">
            	<div id="program" align="center">
                    <form action="resultado.php" method="post">
                        <p>Ingresa el monto pedido por tu prestamo:</p>
                        	<input type="text" name="prestamo">
                        <p>Ingresa el numero de cuotas (Numeros validos:2 a 48 cuotas):</p>
                        	<input type="text" name="plazo">
                        <p>Costo valor de la cuota:</p>
                       		<input type="text" name="cuota">
                        <p>Valores agregados, en caso de que este valor sea nulo colocar 0:</p>
                        	<input type="text" name="agregado">
                          <br /><br>
                        <input type="reset" value="Borrar">
                        <input type="submit" value="Enviar">
                    </form>
            	</div>
            </div>
        </div>
    </BODY>
</HTML>
