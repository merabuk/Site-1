<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    public function product()
    {
    	return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function addFavorite($id, $user)
    {
    	$query = $this->insert([
    		'user_id' => $user,
    		'product_id' => $id,
    	]);
    	return $query;
    }

    public function removeFavorite($id, $user)
    {
    	$query = $this->where([['user_id', $user],['product_id', $id]])->delete();
    	return $query;
    }

    public function checkFavorite($id, $user)
    {
    	$product = $this::where([['product_id', $id], ['user_id', $user]])->first();
    	if ($product === null)
    	{
    		return false;
    	}
    	else
    	{
    		return true;
    	}
    }
}
