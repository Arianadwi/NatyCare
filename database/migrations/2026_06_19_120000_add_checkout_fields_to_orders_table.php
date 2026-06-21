<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->after('id');
            $table->string('nama_lengkap')->nullable()->after('user_id');
            $table->string('no_whatsapp')->nullable()->after('nama_lengkap');
            $table->text('alamat_lengkap')->nullable()->after('no_whatsapp');
            $table->string('provinsi')->nullable()->after('alamat_lengkap');
            $table->string('kota')->nullable()->after('provinsi');
            $table->string('kecamatan')->nullable()->after('kota');
            $table->string('kode_pos')->nullable()->after('kecamatan');
            $table->text('catatan')->nullable()->after('kode_pos');
            $table->string('metode_pembayaran')->nullable()->after('payment_status');
            $table->string('metode_pengiriman')->nullable()->after('metode_pembayaran');
            $table->integer('ongkir')->default(0)->after('metode_pengiriman');
            $table->integer('subtotal')->default(0)->after('ongkir');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'user_id',
                'nama_lengkap',
                'no_whatsapp',
                'alamat_lengkap',
                'provinsi',
                'kota',
                'kecamatan',
                'kode_pos',
                'catatan',
                'metode_pembayaran',
                'metode_pengiriman',
                'ongkir',
                'subtotal',
            ]);
        });
    }
};
