<?php
	// Output MySQL result debugging data (https://github.com/mkjeldsen/Kodestumper/tree/master/php-mysql-result-output-to-table)
	function mysql_output_result_table($sql,$db,$output_to='html') {
		$rs = $db->query($sql);
		$cols = null;

		if ( $output_to == 'console' ) {
			echo "<script>\n";
			echo "// SQL: " . $sql . "\n";
			echo "var row = [];\n";
			while ( $row = $rs->fetch_assoc() ) {
				if ( ! $cols) {
					$cols = array_keys($row);

					foreach ($cols as $col) {
						$vars[] = $col;
						$vars_out .= $col . ",";
					}
					$vars_out = rtrim($vars_out,",");
					foreach ($vars as $var) {
						$this_out .= "\tthis." . $var . " = " . $var . ";\n";
					}
					echo "function Row(" . $vars_out . ") {\n";
					echo $this_out;
					echo "}\n\n";
				}

				foreach ($cols as $col) {
					$cells[] = $row[$col];
				}
//				var_dump($cells);
				foreach ($cells as $cell) {
					$cells_out .= "'" . $cell . "',";
				}
//				var_dump($cells_out);
				$cells_out = rtrim($cells_out,",");
				echo "row.push( new Row(" . $cells_out . ") );\n";
				$cells = "";
				$cells_out = "";
			}
			echo "console.table(row);\n\n";
			echo "</script>";
		} else {
			while ( $row = $rs->fetch_assoc() ) {
				if ( ! $cols) {
					$cols = array_keys($row);

					echo "<table border='1' style='border-collapse:collapse;'>\n<thead style='background:#eee;'>\n<tr>";
					foreach ($cols as $col) {
						echo "<th>$col</th>\n";
					}
					echo "</tr>\n</thead>\n<tbody>";
				}

				echo "<tr>\n";

				foreach ($cols as $col) {
					echo '<td>', $row[$col], "</td>\n";
				}
				echo "</tr>\n";
			}
			echo "</tbody>\n<caption><code style='text-align:left'>" . $sql . "</code></caption>\n</table>";
		}
	}
