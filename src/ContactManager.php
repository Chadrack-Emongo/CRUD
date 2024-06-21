<?php
namespace App;

class ContactManager {
    private $fileHandler;
    private $contacts;

    public function __construct(FileHandler $fileHandler) {
        $this->fileHandler = $fileHandler;
        $this->contacts = $this->fileHandler->read();
    }

    public function getAllContacts() {
        return $this->contacts;
    }

    public function getContactById($id) {
        foreach ($this->contacts as $contact) {
            if ($contact['id'] === $id) {
                return new Contact($contact['id'], $contact['name'], $contact['email'], $contact['phone']);
            }
        }
        return null;
    }

    public function addContact(Contact $contact) {
        $this->contacts[] = [
            'id' => $contact->id,
            'name' => $contact->name,
            'email' => $contact->email,
            'phone' => $contact->phone
        ];
        $this->fileHandler->write($this->contacts);
    }

    public function updateContact(Contact $contact) {
        foreach ($this->contacts as &$contactData) {
            if ($contactData['id'] === $contact->id) {
                $contactData['name'] = $contact->name;
                $contactData['email'] = $contact->email;
                $contactData['phone'] = $contact->phone;
                break;
            }
        }
        $this->fileHandler->write($this->contacts);
    }

    public function deleteContact($id) {
        foreach ($this->contacts as $key => $contact) {
            if ($contact['id'] === $id) {
                unset($this->contacts[$key]);
                break;
            }
        }
        $this->fileHandler->write($this->contacts);
    }
}