<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\Localization\Loc;
?>
            </main>
        </div> <!-- End .content -->

        <footer class="footer container">
            <div class="footer-inner">
                <div class="footer-logo">
                    <img src="<?= MAIN_TEMPLATE_PATH ?>/images/footer/logo.png" alt="logo">
                </div>

                <div class="footer-contacts">
                    <h3 class="footer-title"><?= Loc::getMessage('FOOTER_CONTACTS') ?></h3>
                    <p class="footer-text">+7 (999) 999-99-99</p>
                    <p class="footer-text">+7 (999) 999-99-99</p>
                </div>

                <div class="footer-mode">
                    <h3 class="footer-title"><?= Loc::getMessage('FOOTER_WORKING_MODE') ?></h3>
                    <p class="footer-text">C 10:00 до 21:00 (Пн-Пт)</p>
                    <p class="footer-text">С 11:00 до 20:00 (Сб-Вс)</p>
                </div>

                <div class="footer-social">
                    <h3 class="footer-title"><?= Loc::getMessage('FOOTER_INSTAGRAM') ?></h3>
                    <img src="<?= MAIN_TEMPLATE_PATH ?>/images/footer/instagram.png" alt="insta">
                </div>
            </div>

            <p class="footer-copyright">Copyright © 2022 - 2022</p>
        </footer>
    </div> <!-- End .wrapper -->
</body>
</html>