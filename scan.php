<?php
// Escanea todos los archivos PHP en busca de patrones comunes de malware
function scanDirForMalware($dir) {
    $maliciousPatterns = [
        '/base64_decode\(/', // Código ofuscado
        '/eval\(/', // Ejecución de código
        '/shell_exec\(/', // Ejecución de comandos
        '/system\(/', // Ejecución de comandos
        '/passthru\(/', // Ejecución de comandos
        '/exec\(/', // Ejecución de comandos
        '/`[^`]*`/', // Ejecución de comandos en backticks
        '/\$_(GET|POST|COOKIE|REQUEST|SERVER)\[/', // Variables de entrada
        '/gzinflate\(/', // Descompresión de código malicioso
        '/str_rot13\(/', // Ofuscación de código
    ];

    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
    foreach ($iterator as $file) {
        if ($file->isFile() && $file->getExtension() === 'php') {
            $content = file_get_contents($file->getPathname());
            foreach ($maliciousPatterns as $pattern) {
                if (preg_match($pattern, $content)) {
                    echo "Archivo sospechoso encontrado: " . $file->getPathname() . "<br>";
                    break;
                }
            }
        }
    }
}

// Cambia 'public_html' al nombre de la carpeta raíz de tu sitio si es diferente
$rootDirectory = __DIR__;
echo "<h2>Escaneo de archivos en $rootDirectory</h2>";
scanDirForMalware($rootDirectory);
echo "<br>Escaneo completo.";
?>
