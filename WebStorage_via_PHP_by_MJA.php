<!--

	Site: http://carregandoosite.ptblogs.com
	Estudante de Ciência da Computação
 	Autor: Matheus Johann Araújo <matheusjohannaraujo@gmail.com>
 	Residente: Brasil - Pernambuco - Jaboatão dos Guararapes
 	Data de criação: 26/12/2016
 	Versão 1.0

 -->
<script>
	//Cria cookie com "NOME" e "VALOR"
	function CriarCookie(nome, valor)
	{
		var data = new Date();
		data.setSeconds(data.getSeconds() + 600); // Cookie com 600 segundos ou 10 minutos de vida
	    var tempo = "; expires=" + data.toGMTString();
	    document.cookie = nome + "=" + valor + tempo + "; path=/";
	}
	 
	//Ler cookie através de seu "NOME"
	function LerCookie(nomeDoCookie)
	{
	    var nomeIgual = nomeDoCookie + "=";
	    var arrayCookies = document.cookie.split(';');	 
	    for(var i = 0; i < arrayCookies.length; i++)
	    {
	        var valorDoCookie = arrayCookies[i];
	        while(valorDoCookie.charAt(0) == ' ')
	            valorDoCookie = valorDoCookie.substring(1, valorDoCookie.length);
	        if(valorDoCookie.indexOf(nomeIgual) == 0)
	            return valorDoCookie.substring(nomeIgual.length, valorDoCookie.length);
	    }
	    return null;
	}
	 
	//Exclui cookie através de seu "NOME"
	function RemoverCookie(nomeDoCookie)
	{
	    CriarCookie(nomeDoCookie, '', -1);
	}
</script>
<?php
	//Local Storage	
	$localStorage = new LocalStorage();
	class LocalStorage
	{
		//Seta item com "CHAVE" e "VALOR" no localStorage
		public function setItem($key, $value)
		{
			echo "<script>
					if(!localStorage.getItem('$key'))
					{
						localStorage.setItem('$key', '$value');
						location.href='';
					}
				</script>";
		}

		//Captura valor do item atraves de sua "CHAVE" no localStorage
		public function getItem($key)
		{
			echo "<script>
					if(localStorage.getItem('$key') != null)
						CriarCookie('$key', localStorage.getItem('$key'));
				</script>";		
			return @$_COOKIE[$key];
		}

		// Remove a item do localStorage através de sua "CHAVE"
		public function removeItem($key)
		{
			echo "<script>localStorage.removeItem('$key');</script>";
		}

		//Limpa todas as "CHAVES" e "VALORES" no localStorage
		public function clear()
		{
			echo "<script>localStorage.clear();</script>";
		}
	}
	
	//Session Storage
	$sessionStorage = new SessionStorage();
	class SessionStorage
	{
		//Seta item com "CHAVE" e "VALOR" no sessionStorage
		public function setItem($key, $value)
		{
			echo "<script>
					if(!sessionStorage.getItem('$key'))
					{
						sessionStorage.setItem('$key', '$value');
						location.href='';
					}
				</script>";
		}

		//Captura valor do item atraves de sua "CHAVE" no sessionStorage
		public function getItem($key)
		{
			echo "<script>
					if(sessionStorage.getItem('$key') != null)
						CriarCookie('$key', sessionStorage.getItem('$key'));
				</script>";		
			return @$_COOKIE[$key];
		}

		// Remove a item do sessionStorage através de sua "CHAVE"
		public function removeItem($key)
		{
			echo "<script>sessionStorage.removeItem('$key');</script>";
		}

		//Limpa todas as "CHAVES" e "VALORES" no sessionStorage
		public function clear()
		{
			echo "<script>sessionStorage.clear();</script>";
		}
	}


	//Usando o localStorage via PHP

	$localStorage::setItem("Pernambuco", "Jaboatão dos Guararapes");

	echo $localStorage::getItem("Pernambuco");


	//Usando o sessionStorage via PHP
	$sessionStorage::setItem("CDC", "Ciência da Computação");

	$sessionStorage::setItem("Estudante", "Matheus Johann Araújo");

	echo "<br>".$sessionStorage::getItem("CDC");

	echo "<br>".$sessionStorage::getItem("Estudante");

	$sessionStorage::clear();
?>