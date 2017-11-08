<?php

namespace App\Impl;

interface CompareInterface
{

    /**
     * set Produk ke DB
     * @param int $customer_id
     * @param int $produk_id
     * @return  boolean
     */
    public function setProduk($customer_id, $produk_id);

    /**
     * ambil data yg uda di compare dari db
     * @param  int $customer_id
     * @return laravel collection
     */
    public function showCompared($customer_id);

    /**
     * Hapus Semua Compare Dari Customer ID
     * @param  int $customer_id
     */
    public function clearCompare($customer_id);
}
