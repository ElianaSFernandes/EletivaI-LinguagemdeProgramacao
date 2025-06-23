<?php

    session_start();
    session_destroy(); // SAI DA SESSÃO ATUAL
    header ("location: index.php");
 // FAZ O REDIRECIONAMENTO PARA A PÁGINA DE LOGIN