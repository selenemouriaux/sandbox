<?php
if (!is_active_sidebar('sidebar')) {
  return;
}
?>
<aside class="MainContent-sidebar">
<?php dynamic_sidebar('sidebar')?>
</aside>
<!--<aside class="MainContent-sidebar">-->
<!--            <div class="MainContent-sidebar-widgetArea">-->
<!--                <form action="">-->
<!--                    <input type="text" placeholder="ingrédient, recette, ...">-->
<!--                    <input type="submit" value="">-->
<!--                    <h2>Ingrédients</h2>-->
<!--                    <div>-->
<!--                        <ul>-->
<!--                            <li><a href="">item</a></li>-->
<!--                            <li><a href="">item</a></li>-->
<!--                            <li><a href="">item</a></li>-->
<!--                            <li><a href="">item</a></li>-->
<!--                            <li><a href="">item</a></li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                </form>-->
<!--            </div>-->
<!--            <div class="MainContent-sidebar-widgetArea">-->
<!--                <h2>Catégories</h2>-->
<!--                <div>-->
<!--                    <ul>-->
<!--                        <li><a href="">item</a></li>-->
<!--                        <li><a href="">item</a></li>-->
<!--                        <li><a href="">item</a></li>-->
<!--                        <li><a href="">item</a></li>-->
<!--                        <li><a href="">item</a></li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--            </div>-->
<!--            <button class="MainContent-sidebar-widgetArea-cta" href="">Proposer une recette</button>-->
<!---->
<!--        </aside>-->