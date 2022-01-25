<?php

namespace App\Http\Livewire;

use App\Models\MyParent;
use App\Models\nationalitie;
use App\Models\ParentAttachment;
use App\Models\religion;
use App\Models\typeBlood;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddParent extends Component
{
    use WithFileUploads;   // must be this added if want upload file with livewire

    public $catchError,$updateMode = false,$photos, $show_table = true,$Parent_id, $successMessage ,$attachments,$attachment,$errorMessage;

    public $currentStep = 1,

        // Father_INPUTS
        $Email,
        $Password,
        $Name_Father,
        $Name_Father_en,
        $National_ID_Father,
        $Passport_ID_Father,
        $Phone_Father,
        $Job_Father,
        $Job_Father_en,
        $Nationality_Father_id,
        $Blood_Type_Father_id,
        $Address_Father,
        $Religion_Father_id,

        // Mother_INPUTS
        $Name_Mother,
        $Name_Mother_en,
        $National_ID_Mother,
        $Passport_ID_Mother,
        $Phone_Mother,
        $Job_Mother,
        $Job_Mother_en,
        $Nationality_Mother_id,
        $Blood_Type_Mother_id,
        $Address_Mother,
        $Religion_Mother_id;


    public function updated($propertyName)  // Real-time Validation
    {
        $this->validateOnly($propertyName,[

            'Email' => 'required|email|unique:my_parents,Email',
            'National_ID_Father' => 'required|min:10|max:10|unique:my_parents,National_ID_Father',
            'Passport_ID_Father' => 'required|min:10|max:10|unique:my_parents,Passport_ID_Father',
            'Phone_Father' => 'min:10|unique:my_parents,Phone_Father',
            'National_ID_Mother' => 'required|min:10|max:10|regex:/[0-9]{9}/||unique:my_parents,National_ID_Mother',
            'Passport_ID_Mother' => 'required|min:10|max:10|unique:my_parents,Passport_ID_Mother',
            'Phone_Mother' => 'min:10|unique:my_parents,Phone_Mother',

        ]);
    }


    public function render()   //
    {
        return view('livewire.add-parent',[
            'Nationalities' => Nationalitie::all(),
            'Type_Bloods' => typeBlood::all(),
            'Religions' => Religion::all(),
            'parents' => MyParent::all(),
        ]);
    }


    public function firstStepSubmit()
    {
        $this->validate([   // validation with submit first step
            'Email' => 'required|unique:my_parents,Email,'.$this->id,
            'Password' => 'required',
            'Name_Father' => 'required|min:3|max:50',
            'Name_Father_en' => 'required|min:3|max:50',
            'Job_Father' => 'required|min:3|max:50',
            'Job_Father_en' => 'required|min:3|max:50',
           'National_ID_Father' => 'required|unique:my_parents,National_ID_Father,' . $this->id,
            'Passport_ID_Father' => 'required|unique:my_parents,Passport_ID_Father,' . $this->id,
            'Phone_Father' => 'required|min:10',  // regex:/^([0-9\s\-\+\(\)]*)$/
            'Nationality_Father_id' => 'required',
            'Blood_Type_Father_id' => 'required',
            'Religion_Father_id' => 'required',
            'Address_Father' => 'required|max:200|min:5',
        ]);
        $this->currentStep = 2;
    }


    public function secondStepSubmit()
    {

        $this->validate([   // validation with submit Submit step
            'Name_Mother' => 'required|max:100|min:5',
            'Name_Mother_en' => 'required|max:100|min:5',
            'National_ID_Mother' => 'required|unique:my_parents,National_ID_Mother,' . $this->id,
            'Passport_ID_Mother' => 'required|unique:my_parents,Passport_ID_Mother,' . $this->id,
            'Phone_Mother' => 'required',
            'Job_Mother' => 'required|max:100|min:5',
            'Job_Mother_en' => 'required|max:100|min:5',
            'Nationality_Mother_id' => 'required',
            'Blood_Type_Mother_id' => 'required',
            'Religion_Mother_id' => 'required',
            'Address_Mother' => 'required|max:200|min:5',
        ]);

        $this->currentStep = 3;

    }



    public function showformadd(){
        $this->show_table = false;
    }
    public function showParent(){
        $this->show_table = true;
    }

    public function submitForm(){
      $MyParent =  MyParent::create([   // save data in database
            'Email' => $this->Email,
            'Password' => Hash::make($this->Password),

            // father information
            'Name_Father' => ['en' => $this->Name_Father_en, 'ar' => $this->Name_Father],
            'National_ID_Father' => $this->National_ID_Father,
            'Passport_ID_Father' => $this->Passport_ID_Father,
            'Phone_Father' => $this->Phone_Father,
            'Job_Father' => ['en' => $this->Job_Father_en, 'ar' => $this->Job_Father],
            'Nationality_Father_id' => $this->Nationality_Father_id,
            'Blood_Type_Father_id' => $this->Blood_Type_Father_id,
            'Religion_Father_id' => $this->Religion_Father_id,
            'Address_Father' => $this->Address_Father,

            // Mother_INPUTS
            'Name_Mother' => ['en' => $this->Name_Mother_en, 'ar' => $this->Name_Mother],
            'National_ID_Mother' => $this->National_ID_Mother,
            'Passport_ID_Mother' => $this->Passport_ID_Mother,
            'Phone_Mother' => $this->Phone_Mother,
            'Job_Mother' => ['en' => $this->Job_Mother_en, 'ar' => $this->Job_Mother],
            'Nationality_Mother_id' => $this->Nationality_Mother_id,
            'Blood_Type_Mother_id' => $this->Blood_Type_Mother_id,
            'Religion_Mother_id' => $this->Religion_Mother_id,
            'Address_Mother' => $this->Address_Mother,
        ]);


      if(!empty($this->photos)){                 //  If you find pictures
          foreach ($this->photos as $photo){
//Explanation of the code => create file by id ,    git real name ,               save in this path
              $photo->storeAs($MyParent->id, $photo->getClientOriginalName(), $disk = 'parent_attachment');
              ParentAttachment::create([
                  'file_name' => $photo->getClientOriginalName(),   // save photo name
                  'parent_id' => $MyParent->id,                    // save parent id
              ]);
          }
      }

        $this->successMessage = trans('Messages.added');   // show success message
        $this->clearForm();                                    // run function('clearForm') 'clear Form fields'
        $this->currentStep = 1;                                //redirect to first step
    }

    public function clearForm()   //clear Form fields
    {
        $this->Email = '';
        $this->Password = '';

        // father information
        $this->Name_Father = '';
        $this->Job_Father = '';
        $this->Job_Father_en = '';
        $this->Name_Father_en = '';
        $this->National_ID_Father ='';
        $this->Passport_ID_Father = '';
        $this->Phone_Father = '';
        $this->Nationality_Father_id = '';
        $this->Blood_Type_Father_id = '';
        $this->Address_Father ='';
        $this->Religion_Father_id ='';

        // mother information
        $this->Name_Mother = '';
        $this->Job_Mother = '';
        $this->Job_Mother_en = '';
        $this->Name_Mother_en = '';
        $this->National_ID_Mother ='';
        $this->Passport_ID_Mother = '';
        $this->Phone_Mother = '';
        $this->Nationality_Mother_id = '';
        $this->Blood_Type_Mother_id = '';
        $this->Address_Mother ='';
        $this->Religion_Mother_id ='';

    }

    public function edit($parent_id){

        $this->show_table = false;   // hidne create form
        $this->updateMode = true;   // Show a creation form but fill the fields with data
        $My_Parent = MyParent::find($parent_id);
        $attachments = ParentAttachment::where('parent_id','=',$My_Parent->id)->get();

        $this->Parent_id = $parent_id;
        $this->Email = $My_Parent->Email;


        $this->Name_Father = $My_Parent->getTranslation('Name_Father', 'ar');
        $this->Name_Father_en = $My_Parent->getTranslation('Name_Father', 'en');
        $this->Job_Father = $My_Parent->getTranslation('Job_Father', 'ar');
        $this->Job_Father_en = $My_Parent->getTranslation('Job_Father', 'en');
        $this->National_ID_Father =$My_Parent->National_ID_Father;
        $this->Passport_ID_Father = $My_Parent->Passport_ID_Father;
        $this->Phone_Father = $My_Parent->Phone_Father;
        $this->Nationality_Father_id = $My_Parent->Nationality_Father_id;
        $this->Blood_Type_Father_id = $My_Parent->Blood_Type_Father_id;
        $this->Address_Father =$My_Parent->Address_Father;
        $this->Religion_Father_id =$My_Parent->Religion_Father_id;

        $this->Name_Mother = $My_Parent->getTranslation('Name_Mother', 'ar');
        $this->Name_Mother_en = $My_Parent->getTranslation('Name_Father', 'en');
        $this->Job_Mother = $My_Parent->getTranslation('Job_Mother', 'ar');;
        $this->Job_Mother_en = $My_Parent->getTranslation('Job_Mother', 'en');
        $this->National_ID_Mother =$My_Parent->National_ID_Mother;
        $this->Passport_ID_Mother = $My_Parent->Passport_ID_Mother;
        $this->Phone_Mother = $My_Parent->Phone_Mother;
        $this->Nationality_Mother_id = $My_Parent->Nationality_Mother_id;
        $this->Blood_Type_Mother_id = $My_Parent->Blood_Type_Mother_id;
        $this->Address_Mother =$My_Parent->Address_Mother;
        $this->Religion_Mother_id =$My_Parent->Religion_Mother_id;
    }

    public function firstStepSubmit_edit()
    {
        $this->updateMode = true;
        $this->currentStep = 2;

    }

    //secondStepSubmit_edit
    public function secondStepSubmit_edit()
    {
        $this->updateMode = true;
        $this->currentStep = 3;

    }

    public function submitForm_edit(){
        if ($this->Parent_id){
            $parent = MyParent::find($this->Parent_id);
            $parent->update([
              'Email'=>  $this->Email,
             'Password' => sha1($this->Password),

            'Name_Father' => ['ar'=>$this->Name_Father,'en'=>$this->Name_Father_en],
            'Job_Father' => ['ar'=>$this->Job_Father, 'en'=>$this->Job_Father_en],
            'National_ID_Father' => $this->National_ID_Father,
            'Passport_ID_Father' => $this->Passport_ID_Father,
            'Phone_Father' => $this->Phone_Father,
           'Nationality_Father_id' => $this->Nationality_Father_id,
            'Blood_Type_Father_id' => $this->Blood_Type_Father_id,
            'Address_Father' => $this->Address_Father,
            'Religion_Father_id' => $this->Religion_Father_id,

            'Name_Mother' => ['ar'=>$this->Name_Mother, 'en'=>$this->Name_Mother_en],
            'Job_Mother' => ['ar'=>$this->Job_Mother,'en'=>$this->Job_Mother_en],
            'National_ID_Mother' => $this->National_ID_Mother,
            'Passport_ID_Mother' => $this->Passport_ID_Mother,
            'Phone_Mother' => $this->Phone_Mother,
            'Nationality_Mother_id' => $this->Nationality_Mother_id,
            'Blood_Type_Mother_id' => $this->Blood_Type_Mother_id,
            'Address_Mother' => $this->Address_Mother,
            'Religion_Mother_id' => $this->Religion_Mother_id,
            ]);

        }
        $this->successMessage = trans('Messages.updated');
        $this->updateMode = false;
        $this->show_table=true;
    }

    public function delete($parent_id){
        if(!empty($parent_id)){
            $attachments = ParentAttachment::where('parent_id',$parent_id)->get();
            if(count($attachments) > 0){
                foreach ($attachments as $attachment){
                   // File::delete(public_path('upload/test.png'));
                     Storage::delete('app/parent_attachment'.$parent_id);

                   // Storage::delete( storage_path('app/parent_attachment/'.$parent_id.'/'. $attachment->file_name));
                   // unlink(public_path('app/parent_attachment/'.$parent_id.'/'. $attachment->file_name));
                }
                MyParent::find($parent_id)->delete();
                ParentAttachment::where('parent_id',$parent_id)->delete();
                $this->successMessage = trans('Messages.deleted');
            }else{
                $this->errorMessage = trans('Messages.warning_attachment');
            }
        }
    }


    public function back($step)
    {
        $this->currentStep = $step;
    }
}
