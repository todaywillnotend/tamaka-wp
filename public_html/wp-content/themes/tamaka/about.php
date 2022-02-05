<?php /*Template name:О нас*/ get_header();?>
        <div class="inner-about-us-top">
            <div class="subtitle">
                Добро пожаловать
            </div>
            <div class="title">
                Для кого подходит "АкваМДЕКО"?
            </div>
            <div class="description">
                Состав средства для ускорения процесса выздоровления<br>
                поставляется в 3-х видах:
            </div>
        </div>
    </div>
</section>

<section class="inner-about-us-top-3-cols">
    <div class="container">
        <div class="inner">
            <div class="cols-3">
                <div class="item">
                    <div class="icon">
                        <img src="/images/icon-about-us-3-1.svg" alt="">
                    </div>
                    <div class="text">
                        Средство для орошения и промывания горла и носа «АкваМДЕКО» (ежедневная гигиена и профилактика заболеваний
                        ЛОР-органов и полости рта).
                    </div>
                </div>

                <div class="item">
                    <div class="icon">
                        <img src="/images/icon-about-us-3-2.svg" alt="">
                    </div>
                    <div class="text">
                        Средство для орошения и промывания горла и носа «АкваМДЕКО» (ежедневная гигиена и профилактика заболеваний
                        ЛОР-органов и полости рта).
                    </div>
                </div>

                <div class="item">
                    <div class="icon">
                        <img src="/images/icon-about-us-3-3.svg" alt="">
                    </div>
                    <div class="text">
                        Средство для орошения и промывания горла и носа «АкваМДЕКО» (ежедневная гигиена и профилактика заболеваний
                        ЛОР-органов и полости рта).
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="inner-about-us-middle">
    <div class="container">
        <div class="top-text">
            Даже самые качественные медицинские маски не способны защитить Вас от заражения. Вирус оседает на волосах, ресницах (попадая на слизистую оболочку глаза) и одежде. Вы даже не заметите, как он проникнет в Ваш организм и начнет активно размножаться (репликация).
        </div>

        <div class="cols-3">
            <div class="item">
                <div class="number">
                    2
                </div>
                <div class="step">1</div>
                <div class="name">
                    года на рынке
                </div>
                <div class="text">
                    мы динамично<br>
                    развивающаяся компания
                </div>
            </div>

            <div class="item">
                <div class="number">
                    10
                </div>
                <div class="step">2</div>
                <div class="name">
                    стран
                </div>
                <div class="text">
                    расширяем территории
                </div>
            </div>

            <div class="item">
                <div class="number">
                    100 000
                </div>
                <div class="step">2</div>
                <div class="name">
                    клиентов
                </div>
                <div class="text">
                    знакомы<br>
                    с нашими продуктами
                </div>
            </div>
        </div>

        <div class="subtitle">
            В <span>АкваМДЕКО</span> профессиональный комплекс продуктов,<br>
            разбитый на тематические блоки:
        </div>

        <div class="cols-5">
            <div class="item">
                <div class="image">
                    <img src="/images/icon-about-us-cols-5-1.png" alt="">
                </div>
                <div class="text">
                    БАД<br>
                    АквамДеко
                </div>
            </div>

            <div class="item">
                <div class="image">
                    <img src="/images/icon-about-us-cols-5-2.png" alt="">
                </div>
                <div class="text">
                    Торфогуматы<br>
                    мДеко
                </div>
            </div>

            <div class="item">
                <div class="image">
                    <img src="/images/icon-about-us-cols-5-3.png" alt="">
                </div>
                <div class="text">
                    Питьевая вода<br>
                    ЭнМо
                </div>
            </div>

            <div class="item">
                <div class="image">
                    <img src="/images/icon-about-us-cols-5-4.png" alt="">
                </div>
                <div class="text">
                    Био-маска<br>
                    Мдеко
                </div>
            </div>

            <div class="item">
                <div class="image">
                    <img src="/images/icon-about-us-cols-5-5.png" alt="">
                </div>
                <div class="text">
                    Шампунь<br>
                    Мдеко
                </div>
            </div>
        </div>
    </div>
</section>

<section class="inner-about-us-slider">
    <div class="container">
        <div class="slider-outer">
            <div class="slider-prev main-about-us-photo-swiper-prev"></div>
            <div class="slider-next main-about-us-photo-swiper-next"></div>

            <div class="swiper main-about-us-photo-swiper">
                <?php
                $images = get_field('slider');
                $size = 'thumbnail'; // (thumbnail, medium, large, full или произвольный размер)

                if( $images ): ?>
                    <div class="swiper-wrapper">
                        <?php foreach( $images as $image ): ?>
                            <div class="swiper-slide">
                                <?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section class="inner-about-us-bottom-form">
    <div class="container">
        <div class="partner-form">
            <div class="block-name">
                Хотите стать партнером нашей компании ?
            </div>
            <div class="block-description">
                оставьте заявку мы свяжемся с вами в ближайшее время
            </div>
            <?php echo do_shortcode('[contact-form-7 id="68" title="Контактная форма 1"]');?>
        </div>
    </div>
</section>
<style>
.wpcf7-response-output {
    position: relative;
    z-index: 1;
    font-size: 13px;
}
.wpcf7-not-valid-tip {
	color: #d71f1f!important;
    background: rgba(255,255,255,0.5);
}
</style>
<? get_footer();