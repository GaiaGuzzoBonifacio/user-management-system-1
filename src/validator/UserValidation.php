<?php

namespace sarassoroberto\usm\validator;
use sarassoroberto\usm\entity\User;

class UserValidation {

    public const FIRST_NAME_ERROR_NONE_MSG = 'Il nome è ggiusto !!';
    public const FIRST_NAME_ERROR_REQUIRED_MSG = 'Il nome è obbligatorio';

    public const LAST_NAME_ERROR_NONE_MSG = 'Il cognome è ggiusto !!';
    public const LAST_NAME_ERROR_REQUIRED_MSG = 'Il cognome è obbligatorio';

    public const BIRTHDAY_ERROR_FORMAT_DATE = 'Il formato della data non è valido';
    public const BIRTHDAY_NONE = '';
    public const BIRTHDAY_ERROR_NONE_MSG = 'Il formato della data è corretto';

    private $user;
    private $errors = [] ;// Array<ValidationResult>;
    private $isValid = true;

    public $firstNameResult;

    public function __construct(User $user) {
        $this->user = $user;
        $this->validate();
    }

    private function validate()
    {   
        //$this->firstNameResult =  $this->validateFirstName();
        $this->errors['firstName']  = $this->validateFirstName();
        $this->errors['lastName']  = $this->validateLastName();
        $this->errors['birthday']  = $this->validateBirthday();

    }

    public function getIsValid(){
        $this->isValid = true;
        foreach ($this->errors as $validationResult) {
            $this->isValid = $this->isValid && $validationResult->getIsValid();
        }
        return $this->isValid;
    }

    private function validateFirstName():?ValidationResult
    {
        $firstName = trim($this->user->getFirstName());

        if(empty($firstName)){
            $validationResult = new ValidationResult(self::FIRST_NAME_ERROR_REQUIRED_MSG,false,$firstName);
        } else {
            $validationResult = new ValidationResult(self::FIRST_NAME_ERROR_NONE_MSG,true,$firstName);
        };
        return $validationResult;
    }

    private function validateLastName():?ValidationResult
    {
        $lastName = trim($this->user->getLastName());

        if(empty($lastName)){
            $validationResult = new ValidationResult(self::LAST_NAME_ERROR_REQUIRED_MSG,false,$lastName);
        } else {
            $validationResult = new ValidationResult(self::LAST_NAME_ERROR_NONE_MSG,true,$lastName);
        };
        return $validationResult;
    }

    private function validateBirthday():?ValidationResult
    {
        $date = trim($this->user->getBirthday());

        if(empty($date)){
            return new ValidationResult(self::BIRTHDAY_NONE, true, NULL);
        }else{
            // TODO: da testare validateDate e da spostare in una classe fatta solo di validatori
            // Validator::isValidDate('2000-02-1') per esempio
            if($this->validateDate($date)){
                return new ValidationResult(self::BIRTHDAY_ERROR_NONE_MSG, true, NULL);

            }else{
                return new ValidationResult(self::BIRTHDAY_NONE, true, NULL);
            }
        }
     
    }

    /**
     *  foreach($userValidation->getErrors() as $error ){
     *   echo "<li</li>"
     *  }
     * 
     */
    public function getErrors()
    {
        return $this->errors; 
    }

    /**
     * $userValidation->getError('lastName');
     * @var ValidationResult $errorKey Chiave associativa che contiene un ValidationResult corrispondente
     */
    public function getError($errorKey)
    {
        return $this->errors[$errorKey];
    }


    public function validateDate($date, $format = 'Y-m-d')
    {
        // fonte https://stackoverflow.com/questions/19271381/correctly-determine-if-date-string-is-a-valid-date-in-that-format/19271434

        $d = \DateTime::createFromFormat($format, $date);
        // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
        return ($d && $d->format($format) === $date);
    }
}