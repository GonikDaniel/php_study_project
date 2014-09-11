<?php 

//функция отрисовывает гистограмму со значениями из двумерного массива $data, в котором присутствуют названия
//столбцов и их величина + мы задаем максимальную величину и имя директории, куда будем сохранять изображения
function draw_bar_graph($width, $height, $data, $max_value, $filename) 
{
	//Задаем размеры гистограммы
	$img = imagecreatetruecolor($width, $height);
	//Задаем цвета для элементов
	$bg_color = imagecolorallocate($img, 255, 255, 255);
	$text_color = imagecolorallocate($img, 255, 255, 255);
	$bar_color = imagecolorallocate($img, 0, 0, 0);
	$border_color = imagecolorallocate($img, 192, 192, 192);

	$font = '/Library/Fonts/Courier New Bold.ttf';

	//отрисовываем фон
	imagefilledrectangle($img, 0, 0, $width, $height, $bg_color);
	//добавляем столбцы гистограммы c названиями на них, прежде определив ширину столбца
	$bar_width = $width/(count($data)*2 + 1);
	for ($i=0; $i < count($data); $i++) { 
		imagefilledrectangle($img, ($i*$bar_width*2)+$bar_width, $height, ($i*$bar_width*2)+$bar_width*2, $height-(($height/$max_value)*$data[$i][1]), $bar_color);
		// imagestringup($img, 5, ($i*$bar_width*2)+$bar_width, $height-5, $data[$i][0], $text_color);
		imagettftext($img, 11, 90, ($i*$bar_width*2)+$bar_width+20, $height-5, $text_color, $font, $data[$i][0]);
	}
	//рисуем прямоугольник вокруг
	imagerectangle($img, 0, 0, $width, $height, $border_color);

	//добавляем диапозон значений слева
	for ($i=1; $i <= $max_value; $i++) { 
		imagestring($img, 5, 0, $height-($i*($height/$max_value)), $i, $bar_color);
	}

	//сохраняем гистограмму в файле и убираем из памяти
	imagepng($img, $filename, 5);
	imagedestroy($img);
}
