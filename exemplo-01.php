<?php 

$filename = "usuarios.csv";

if (file_exists($filename)){ //verifica se o arquivo existe

	$file = fopen($filename, "r"); //abre o arquivo e inicia a leitura

	$headers = explode(";", fgets($file)); //retira o separador do arquivo csv e salva os dados da linha

	$data = array();

	while ($row = fgets($file)){ // enquanto tiver linha no arquivo ele adiciona o valor a variavel row

		$rowData = explode(';', $row); //retira separador da variavel
		$linha = array(); 
		
		for ($i=0; $i < count($headers) ; $i++) { 
	 		
	 		$linha[$headers[$i]] = $rowData[$i]; // pega a posição do $headers e define como chave, atribuindo a mesma posição da linha(rowdata) no array.

		}
		
		array_push($data, $linha); // valores salvos em $linha, joga para variavel $data fora do while.
	}

	fclose($file);

	echo json_encode($data);
}



 ?>