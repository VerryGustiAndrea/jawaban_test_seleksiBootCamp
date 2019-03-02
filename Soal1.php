<html>
<head>
	<title>Form Biodata Peserta</title>
	<style>
		body {
			font-family: "segoe ui";
		}
		h1 {
			font-size: 25px;
		}
		input, select {
			border: 1px solid #CCCCCC;
			padding: 7px;
			font-size: 14px;
		}
		input[type="submit"] {
			padding: 7px 15px;
			margin-left: 120px;
			cursor: pointer;
		}
		label {
			width: 120px;
			display: block;
			float: left;
		}
		.checkbox, .radio {
			float:none;
			width: auto;
		}
		.row::after {
			content: "";
			display: block;
			clear:both;
		}
		.row {
			margin-bottom: 5px;
			clear: both;
		}
		.options {
			float:left;
		}
	</style>
</head>
<body>
	<h1>Form Biodata Peserta</h1>
	<form action="" method="post">
		<div class="row">
			<label>Nama</label>
			<input type="text" name="nama" value="<?=isset($_POST['nama']) ? $_POST['nama'] : ''?>"/>
		</div>
		<div class="row">
			<label>Address</label>
			<input type="text" name="address" value="<?=isset($_POST['address']) ? $_POST['address'] : ''?>"/>
		</div>
		<div class="row">
			<label>Hobby</label>
			<input type="text" name="hobby" value="<?=isset($_POST['hobby']) ? $_POST['hobby'] : ''?>"/>
		</div>
		<div class="row">
			<label>is Married</label>
			<select name="area">
				<?php $options = array('Sudah', 'Belum');
				foreach ($options as $area) {
					$selected = @$_POST['area'] == $area ? ' selected="selected"' : '';
					echo '<option value="' . $area . '"' . $selected . '>' . $area . '</option>';
				}?>
			</select>
		</div>
		<div class="row">
			<label>School</label>
			<div class="options">
				<?php
				$school = array('H' => 'High School', 'U' => 'University');
				foreach ($school as $kode => $detail) {
					$checked = @$_POST['school'] == $kode ? ' checked="checked"' : '';
					echo '<label class="radio">
							<input name="school" type="radio" value="' . $kode . '"' . $checked . '>' . $detail . '</option>
						</label>';
				}
				?>
			</div>
		</div>
		<div class="row">
			<label>Skill</label>
			<div class="options">
				<?php 
				$program = array('HTML', 'CSS', 'Javascript', 'PHP', 'MySQL');
				foreach ($program as $skill) {
					$checked = isset($_POST['skill_' . $skill]) ? ' checked="checked"' : '';
					echo '<label class="checkbox">
							<input type="checkbox" name="skill_' . $skill . '"' . $checked . '>' . $skill . 
						'</label>';
				}
				?>
			</div>
		</div>
		<div class="row">
			<input type="submit" name="submit" value="Simpan"/>
		</div>
	</form>
	<?php
	if (isset($_POST['submit'])) {
		echo '<h1>Hasil Input</h1>';
		echo '<ul>';
		echo '<li>Nama: ' . $_POST['nama'] . '</li>';
		echo '<li>Address: ' . $_POST['address']. '</li>';
		echo '<li>Hobby: ' . $_POST['hobby'] . '</li>';
		echo '<li>is Married: ' . $_POST['area'] . '</li>';
		echo '<li>School: ' . (isset($_POST['school']) ? $school[$_POST['school']] : '-') . '</li>';
		
		$list_skill = array();
		foreach ($program as $skill) {
			if ( isset($_POST['skill_' . $skill]) )
			{
				$list_skill[] = $skill;
			}
		}

		echo '<li>Skill: ' . ($list_skill ? join($list_skill, ', ') : '-') . '</li>';
		echo '</ul>';
	}?>
</body>
</html>