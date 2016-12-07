<?php

use Illuminate\Database\Seeder;

class TXTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $tx = [
			[
				  'token' => '11',
				  'tx_id' => '1',
				  'tx_amount'	=> '100',
				  'amount' => '11',
				  'tx_method'	=> 'a',
				  'tx_time' => '2016-06-05 23:14:56',
				  'tx_desc' => '123',
				  'merchant_id' => '3145',
				  'card_type' => '1',
				  'tx_status'	=> 'PENDING',
				  'tx_cleared_time' => date('Y-m-d H:i:s'),
				  'tx_dispatched_time'	=> date('Y-m-d H:i:s'),
				  'ip' => '1234',
				  'client_email' => 'a.b@c.com',
				  'client_mobile'	=> '01686056913',
				  'client_name' => 'Khyo'
			],
		];

		DB::table('tx_info')->insert($tx);
    }
}
