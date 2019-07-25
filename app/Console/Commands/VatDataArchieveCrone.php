<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repository\Archieve\ArchieveRepository;
use App\Repository\Vat\VatInformationRepository;

class VatDataArchieveCrone extends Command
{
    protected $vatDataArchieve;
    protected $vatInformation;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'VatDataArchieve:crone';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Archieve records with more than 5 years';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ArchieveRepository $vatDataArchieve,VatInformationRepository $vatInformation)
    {
        $this->vatDataArchieve=$vatDataArchieve;
        $this->vatInformation=$vatInformation;

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $today = date("Y-m-d 00:00:00");
        $datas =  $this->vatInformation->getVatInformation()->getAll();
      
        foreach($datas as $data){
            $created_date = date('Y-m-d', strtotime($data->created_at));
            $diff= $created_date->diff($today);
            if($diff->day > 1825){
                $this->vatDataArchieve->getVatDataArchieve()->create($data);  
                $this->vatInformation->getVatInformation()->delete($data->id);
            }
             
        }
    
    }
}
