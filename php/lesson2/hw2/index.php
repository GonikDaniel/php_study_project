<?php require_once '../../../tpl/header.php'; ?>
	<div class="homework2">
		<h1>Домашнее задание №2</h1>
			<div class="items item1">
				<p>1. Объявите две целочисленные переменные $a и $b и задайте им произвольные начальные значения. 
				Затем напишите скрипт, который работает по следующему принципу: </p>
				<ul>
					<li>
						a. если $a и $b положительные, выведите их разность (ноль можно считать положительным числом): <?php echo $relult; ?>
					</li>
					<li>
						b. если $а и $b отрицательные, выведите их произведение: <?php echo $relult; ?>
					</li>
					<li>
						c. если $а и $b разных знаков, выведите их сумму: <?php echo $relult; ?>
					</li>
				</ul>
				So, paste your two numbers here:
				<input type="text" id="first_number">
				<input type="text" id="second_number">
				<button id="item1_results_button">Дайте мне результат!</button>
				<div class="item1_results"></div>
				
			</div>

			<div class="items item2">
				<p>2. Присвойте переменной $а значение в промежутке [0..15]. С помощью оператора switch организуйте вывод чисел от $a до 15;</p>

						Ваш выбор: <input type="text" name="number" id="number"><br>
						<input type="button" value="Check it out!" id="switch">

					<div class="switch_results"></div>

			</div>

			<div class="items item3">
				<p>3. Реализуйте основные 4 арифметические операции (+, -, *, %) в виде функций с двумя параметрами. 
				Обязательно используйте оператор return.</p>
					<?php 
						function adding($a, $b) {
								return $a + $b;
							}

						function substracting($a, $b) {
								return $a - $b;
							}
					 
						function multiply($a, $b) {
								return $a * $b;
							}
					 
						function divide($a, $b) {
								return $a / $b;
							}
					?>
				<ul>
					<li>
						<pre>a. &lt;?php function adding($a, $b) { return $a + $b; } ?&gt;</pre>
					</li>
					<li>
						<pre>a. &lt;?php function substracting($a, $b) { return $a + $b; } ?&gt;</pre>
					</li>
					<li>
						<pre>a. &lt;?php function multiply($a, $b) { return $a + $b; } ?&gt;</pre>
					</li>
					<li>
						<pre>a. &lt;?php function divide($a, $b) { return $a + $b; } ?&gt;</pre>
					</li>
				</ul>
			</div>

			<div class="items item4">
				<p>4. Реализуйте функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), 
				где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. 
				В зависимости от переданного значения операции выполните одну из арифметических операций 
				(используйте функции из пункта 4) и верните полученное значение (используйте switch).</p>

				<p>So, paste your two numbers and operation here:</p>
				<input type="number" id="arg1">
				<input type="number" id="arg2">
				<select name="operation" id="operation">
					<option value="add">Add</option>
					<option value="substract">Substract</option>
					<option value="multiply">Multiply</option>
					<option value="divide">Divide</option>
				</select>
				<button id="item4_results_button">Супер функция!</button>
				<div class="item4_results"></div>

			</div>

			<div class="items item5">
			<h2>Продвинутый блок.</h2>
				<p>5. С помощью рекурсии организуйте функцию возведения числа в степень. 
				Формат: function power($val, $pow), где $val – заданное число, $pow – степень.</p>


				<p>А теперь еще больше математики!</p>
				Ваша цифра: <input type="number" id="val">
				Степень: <input type="number" id="pow">
				<button id="item5_results_button">Степени!</button>
				<div class="item5_results"></div>

			</div>
			
			<div class="items item6">
			
				<p>6. Напишите функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:
					<p>22 часа 15 минут</p>
					<p>21 час 43 минуты</p>
					<p>и т.д.</p>
					<p>Подсказка: часы и минуты можно узнать с помощью встроенной функции PHP – date.</p>
				
				<button id="item6_results_button">Точное время не подскажете?</button>
				<div class="item6_results"></div>

			</div>
		</div>
		
		<script type="text/javascript" src="../../js/jquery-1.11.1.min.js"></script>
		<script type="text/javascript" src="../../js/global.js"></script>
</body>
</html>