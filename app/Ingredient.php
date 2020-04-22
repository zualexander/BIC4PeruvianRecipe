<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Support\Carbon;

/**
 * Class Ingredient
 *
 * @package App
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $slug
 * @property int $recipe_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Recipe newModelQuery()
 * @method static Builder|Recipe newQuery()
 * @method static Builder|Recipe query()
 * @method static Builder|Recipe whereCreatedAt($value)
 * @method static Builder|Recipe whereId($value)
 * @method static Builder|Recipe whereName($value)
 * @method static Builder|Recipe whereSlug($value)
 * @method static Builder|Recipe whereDescription($value)
 * @method static Builder|Recipe whereDomainId($value)
 * @method static Builder|Recipe whereUpdatedAt($value)
 * @mixin Eloquent
 * @property-read Recipe $recipe
 */
class Ingredient extends BaseModel
{
    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
