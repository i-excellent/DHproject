<?php
include ROOT.'/app/views/layouts/header.php';
include ROOT.'/app/views/layouts/left_menu.php';
?>
<div id="block_content">
    <script src="/app/views/JavaScript/work_search.js"></script>
    <h3 style="text-align:center;">Попробуйте ввести слово ajax</h3>
    <div id="container">
          <div style="margin:20px auto; text-align: center;">
              <form method="post" action="/app/views/JavaScript/work_search.js">
                <input type="text" name="search" id="search_box" class='search_box'/>
                <input type="submit" value="Поиск" class="search_button" /><br />
            </form>
        </div>
        <div>
            <div id="searchresults">Результаты для <span class="word"></span></div>
            <ul id="results" class="update">
            </ul>
        </div>
    </div>
</div>
<?php
include ROOT.'/app/views/layouts/footer.php';
?>


