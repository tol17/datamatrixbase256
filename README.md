datamatrixbase256
=================

Form for Russian Post Office mail transfer with datamatrix Base256 stamp



Формирование почтового бланка Почты России с штампом проверки в формате Datamatrix. Основан на библиотеке tcpdf. Формат кодирования Base256.

Для кодирования в формате Base256 определены два дочерних класса расширяющих стандартные классы библиотеки tcpdf:

1. file: datamatrixbase256/tcpdf_datamatrix_base256.php, class TCPDF2DDatamatrixBarcode extends TCPDF2DBarcode создает объект DatamatrixBase256
2. file: datamatrixbase256/datamatrixbase256, class DatamatrixBase256 extends Datamatrix Переопределена функция getHighLevelEncoding($data) для принудительного кодирования в формате Base256.

File: postform, class: PostForm - валидация данных, сохранение данных для повторного редактирования формирование строки данных для Datamatrix штампа.

File: datamatrix.php, class: DatamatrixImage - создание Datamarix кода, создание png картинки.

File: postblank.php - почтовый бланк с datamatrix кодом.

Example for paste datamatrix in TCPDF doc
=================

Если бланк наложенного платежа генерируется в формате pdf с помощью tcpdf

$pdf - inctance of Tcpdf object

$png = (new TCPDF2DDatamatrixBarcode($dataMatrixValue))->getBarcodePngData(40, 40);

$pdf->Image('@' . $png, 130, 3, 40, 40, 'PNG', '', 'T', true, 300);

