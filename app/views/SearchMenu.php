<?php
class SearchMenu
{
    public function createMenuSearch(){
        $DBH = dbConnect::getConnection();
        $result=$DBH->query("SELECT DISTINCT type FROM subject");
        if($result->rowCount() > 0);{
            $row1 = $result->fetchAll(PDO::FETCH_ASSOC);

            echo
            "
<form action=\"test1.php\" method=\"post\" name=\"drop_down_box\">
<select name=\"menu\" size=\"1\">
";
            foreach ($row1 as $row)
            {echo "<option value=\"$row[type]\">$row[type]</option><br>";}

            echo "
</select>
</form>
        ";
        }
    }}