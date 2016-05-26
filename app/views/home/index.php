Hallloo 
<br>
<?php echo $data['product']->naam; echo $data['product']->omschrijving; ?>
<br>
<?php echo $data['config']->webwinkelnaam ?>

{% filter upper %}
    This text becomes uppercase
{% endfilter %}