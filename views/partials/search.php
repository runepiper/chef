<form class="form" action="/">
    <input type="hidden" name="action" value="search">
    <label class="form__label form__label--hidden">Suchbegriff</label>
    <input class="form__input form__input--unobtrusive" type="search" name="query" placeholder="Suche" value="<?php echo $query ?? '' ?>">
</form>
