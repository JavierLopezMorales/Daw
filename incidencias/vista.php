<?php
	class Vista {
		public function mostrar($nombreVista, $data = null) {

			include_once("vistas/$nombreVista.php");

		}
    }
