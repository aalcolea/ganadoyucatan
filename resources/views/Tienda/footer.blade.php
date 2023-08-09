<style>
        footer{
            background-color: #21223e;
            font-family: sans-serif;
            /*padding: 7rem 0;*/
            color: black;
            font-size: 17px;
            font-family: sans-serif;
        }
        .container_footer{
            display: flex;
            /* align-items: center; */
            text-align: center;
            justify-content: center;
            flex-wrap: wrap;
            margin-left: -15px;
            margin-right: -15px;
            margin-left: auto;
            margin-right: auto;
            width: 100%;
        }
        .container_footer div{
/*            width: 30%;
*/            height: 30%;
        }
        .about,
        .contact,
        .fotos
        {
            display: grid;
            justify-items: center;
            margin-bottom: 0;
            padding-right: 1rem!important;
        }
        .about h3,
        .contact h3,
        .fotos h3
        {
            font-size: 20px;
            font-family: 'Poppins', sans-serif;
            color: white;
            margin-bottom: 16px;
            text-align: initial;
        }
        .about p{
            font-family: 'Source Serif Pro', serif;
            margin: 10px 0 24px;
            text-align: justify;
            color: burlywood;
        }
        .list-unlisted{
          text-align: initial;
          list-style: none;
          padding: 0;
          margin: 0;
        }
        .list-unlisted li{
          margin-bottom: 10px;
        }
           /* .list-unlisted li i{
              color: #f6c819;
            }*/
        .list-unlisted li span{
          color: white;
          font-size: 16px;
          font-family: 'Poppins', sans-serif;
          margin: 1rem!important;
        }
        .footer-wrap .list-unstyled{
          color: white;
          font-size: 20px;
          font-family: 'Poppins', sans-serif;
          margin-right: 5px;
          margin-left: 40px;
        }
        .footer-wrap a{
          color: white;

        }
        
        .contact img{
            width: 24px;
            height: 22px;
            object-fit: fill;
            margin: 10px;
        }
        .redes-sociales{
            display: flex;
            
        }
        .fotos img{
            width: 122px;
            height:100px;
            object-fit: cover;
        }
        .contact{
            display: grid;
            align-items: center;
            justify-items: center;
        }
        .contact ul li{
            list-style: none;

        }
        .footer-wrap{
          border-top: 1px solid white;
        }
        .footer-wrap ul{
          margin-bottom: 0;

        }
        .footer-wrap ul li{
          /*display: inline-block;*/
          margin-right: 15px;
        }
        .footer-wrap ul li:hover{
          color: brown;
        }
        @media (max-width:640px){
          footer{
            display: none;
          }
        }
        @import url("https://fonts.googleapis.com/css2?family=Poppins&display=swap");

* {
margin: 0;
padding: 0;
box-sizing: border-box;
}
/* footer{
box-sizing: border-box;
} */
*:focus,
*:active {
outline: none !important;
-webkit-tap-highlight-color: transparent;
}

.wrappers {
display: inline-flex;
list-style: none;
}

.wrappers .icon {
position: relative;
background: #ffffff;
border-radius: 50%;
padding: 15px;
margin: 10px;
width: 50px;
height: 50px;
font-size: 18px;
display: flex;
justify-content: center;
align-items: center;
flex-direction: column;
box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
cursor: pointer;
transition: all 0.2s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

.wrappers .tooltip {
position: absolute;
top: 0;
font-size: 14px;
background: #ffffff;
color: #ffffff;
padding: 5px 8px;
border-radius: 5px;
box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
opacity: 0;
pointer-events: none;
transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

.wrappers .tooltip::before {
position: absolute;
content: "";
height: 8px;
width: 8px;
background: #ffffff;
bottom: -3px;
left: 50%;
transform: translate(-50%) rotate(45deg);
transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

.wrappers .icon:hover .tooltip {
top: -45px;
opacity: 1;
visibility: visible;
pointer-events: auto;
}

.wrappers .icon:hover span,
.wrappers .icon:hover .tooltip {
text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.1);
}

.wrappers .facebook:hover,
.wrappers .facebook:hover .tooltip,
.wrappers .facebook:hover .tooltip::before {
background: #1877F2;
color: #ffffff;
}

.wrappers .twitter:hover,
.wrappers .twitter:hover .tooltip,
.wrappers .twitter:hover .tooltip::before {
background: #ea4335;
color: #ffffff;
}

.wrappers .instagram:hover,
.wrappers .instagram:hover .tooltip,
.wrappers .instagram:hover .tooltip::before {
background: #E4405F;
color: #ffffff;
}

.wrappers .youtube:hover,
.wrappers .youtube:hover .tooltip,
.wrappers .youtube:hover .tooltip::before {
background: #CD201F;
color: #ffffff;
}
.fotos h3{
  padding-left: 46px;
}
    </style>
    <footer>
        <div class="container_footer">
            <div class="about">
                <h3>Ganado-Yucatán</h3>
                <p>
                    somos una plataforma dedicada a brindarle servicios al sector ganadero de Yucatán, poniendo a su alacance herramientas digitales que le ayuden a promover sus ganados.
                </p>
                <ul class="list-unlisted">
                  <li>
                    <i class="fa-solid fa-building"><span>Oficinas Mérida Yucatán</span></i>
                  </li>
                  <li>
                    <i class="fa-solid fa-phone"><span>9996-5570-08</span></i>
                  </li>
                  <li>
                    <i class="fa-solid fa-envelope"><span>www.ganadoyucatan.com</span></i>
                  </li>
                </ul>
                <!-- <button>Enviar E-mail</button> -->
            </div>
            <div class="contact">
                <h3>Nuestras redes sociales</h3>
                <ul class="wrappers">
                  <li onclick="window.location.href='https://www.facebook.com/ganadoyucatan';" class="icon facebook">
                    <span class="tooltip">Facebook</span>
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                  </li>
                  <li onclick="window.location.href = 'mailto:ganado.yucatan@gmail.com'" class="icon twitter">
                    <span class="tooltip">Correo</span>
                    <span><i class="fa-solid fa-envelope"></i></span>
                  </li>
                  <li onclick="window.location.href='https://www.instagram.com/ganado_yuc/';" class="icon instagram">
                    <span class="tooltip">Instagram</span>
                    <span><i class="fab fa-instagram"></i></span>
                  </li>
                  <li onclick="window.location.href='https://www.youtube.com/@ganadoyucatanpeninsular6593/featured';" class="icon youtube">
                    <span class="tooltip">Youtube</span>
                    <span><i class="fab fa-youtube"></i></span>
                  </li>
                </ul>
            </div>
        </div>
        </div>
    </footer>
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa-solid fa-chevron-up"></i>
		</span>
	</div>
<body>