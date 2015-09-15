# Preact

For those who like component-based templates, and want to ease the transition to ReactJS.

Write your code as preact, and everything will be neatly organized to become React Components later.

## Basic Usage

###Setup a simple renderable
```php
<?php
class RecipeList extends Qaribou\Preact\Component
{
	public function render(): string
	{
		// Sanitize our output
		$p = array_map(htmlescapechars, $this->props);

		$recipeItems = array_reduce($p['recipes'], function($recipe) {
			return "<li>{$recipe}</li>";
		};

		return <<< EOT
		<ul class="{$p['class']}">
			{$recipeItems}
		</ul>
EOT;
	}
}
```

###Build an object from the component
```php
$Recipes = new RecipeList([
	'class' => 'col-md-4',
	'recipes' => ['Borscht', 'Pretzels', 'Vichyssoise']
]);
```

###Render it in your template
```php
<?php
echo <<< EOT
<section>
	<h1>My Recipes</h1>
	{$Recipes}
</section>
?>
<aside class="sidebar">
	<?= $Recipes ?>
</aside>
```
