<?php
get_header();
?>
<main class="error-page">
    <p class="error-page__code">FOUTMELDING 404</p>
    <h1>Pagina niet gevonden</h1>
    <p>Deze pagina bestaat niet (meer). Controleer het webadres of ga terug naar de homepage.</p>
    <a class="error-page__link" href="<?php echo esc_url(home_url('/')); ?>">Terug naar home</a>
</main>
<?php
get_footer();
