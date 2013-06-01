<?php

namespace Blogger\BlogBundle\AbstractEntity;

use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\MinLength;
use Symfony\Component\Validator\Constraints\MaxLength;
/**
 * Description of Enquiry
 *
 * @author juanlvo
 */
class Enquiry 
{
    protected $name;

    protected $email;

    protected $subject;

    protected $body;

    /**
     * Method for get the name of the enquiry
     * 
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Method for set the name of the enquiry
     * 
     * @param string $name name of the enquiry
     * @return nothing
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * Method for get the email from the enquiry
     * 
     * @return string
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Method for set the email of the enquiry
     * 
     * @param string $email email of the enquiry
     * @return nothing
     */
    public function setEmail($email) {
        $this->email = $email;
    }

    /**
     * Method for get the subject
     * 
     * @return string
     */
    public function getSubject() {
        return $this->subject;
    }

    /**
     * Method for set thesubject of the enquiry
     * 
     * @param string $subject subject of the enquiry
     * @return nothing
     */
    public function setSubject($subject) {
        $this->subject = $subject;
    }

    /**
     * Method for get the body of the enquiry
     * 
     * @return string
     */
    public function getBody() {
        return $this->body;
    }

    /**
     * Method for set the body of the enquiry
     * 
     * @param string $body body of the enquiry
     * @return nothing
     */
    public function setBody($body) {
        $this->body = $body;
    }
    
    /**
     * Method loadValidatorMetadata
     * 
     * @param \Blogger\BlogBundle\AbstractEntity\ClassMetadata $metadata
     */
    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('name', new NotBlank());

        $metadata->addPropertyConstraint('email', new Email(array(
            'message' => 'symblog does not like invalid emails. Give me a real one!'
        )));

        $metadata->addPropertyConstraint('subject', new NotBlank());
        $metadata->addPropertyConstraint('subject', new MaxLength(50));

        $metadata->addPropertyConstraint('body', new MinLength(50));
    }    
}
