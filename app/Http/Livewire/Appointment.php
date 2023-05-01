<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Appointments;

class Appointment extends Component
{

    public $appointment, $name, $service_type,$date_appt,$time_appt, $appt_id;
    public $isOpen = 0;
  
    public $deleteId = '';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $this->appointment = Appointments::all();
        return view('livewire.appointment');
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function openModal()
    {
        $this->isOpen = true;
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function closeModal()
    {
        $this->isOpen = false;
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->name = '';
        $this->service_type = '';
        $this->date_appt = '';
        $this->time_appt = '';
        $this->appt_id = '';
    }
     
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $this->validate([
            'name' => 'required',
            'service_type' => 'required',
            'date_appt' => 'required',
            'time_appt' => 'required',
        ]);
        Appointments::updateOrCreate(['id' => $this->appt_id], [
            'name' => $this->name,
            'service_type' => $this->service_type,
            'date_appt' => $this->date_appt,
            'time_appt' => $this->time_appt,
        ]);
  
        session()->flash('message', 
            $this->appt_id ? 'Appointment Updated Successfully.' : 'Appointment Created Successfully.');
            
        $this->closeModal();
        $this->resetInputFields();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {

        $appointment = Appointments::findOrFail($id);
        $time_appt = $appointment->time_appt;
        $carbon = \Carbon\Carbon::parse( $time_appt);
        $formattedTime = $carbon->format('H:i'); // Output: 08:30:00

        $this->appt_id = $id;
        $this->name = $appointment->name;
        $this->service_type = $appointment->service_type;
        $this->date_appt = $appointment->date_appt;
        $this->time_appt =  $formattedTime ;
    
        $this->openModal();
    }
     
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     public function deleteId($id)
     {
     $this->deleteId = $id;
     } 
    public function delete()
    {
        Appointments::find($this->deleteId)->delete();
        session()->flash('message', 'Appointment Deleted Successfully.');
    }

    //old delete no live wire
    // public function delete($id)
    // {
    //     Appointments::find($id)->delete();
    //     session()->flash('message', 'Appointment Deleted Successfully.');
    // }
}
