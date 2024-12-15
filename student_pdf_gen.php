<?php
require 'vendor/autoload.php'; // Include the Dompdf library

use Dompdf\Dompdf;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? 'Default Title';
    $content = $_POST['content'] ?? 'Default Content';

    $htmlTemplate = file_get_contents('studentReportcardTemplate.php');

    $html = str_replace(['{{ title }}', '{{ content }}'], [$title, $content], $htmlTemplate);

    $dompdf = new Dompdf();

    $dompdf->loadHtml($html);

    $dompdf->setPaper('A4', 'portrait');

    $dompdf->render();

    $output = $dompdf->output();
    $filePath = 'Document.pdf';
    file_put_contents($filePath, $output);
    echo "<a href='<?php echo htmlspecialchars($filePath); ?>' download='document.pdf'>Download</a>";

    exit;
}
?>