    <?php

    Class Validator {
        private $errors = [];

        public function validate($field, $value, $rules) {
            foreach ($rules as $rule => $params) {
                if (method_exists($this, $method = "validate" . ucfirst($rule))) {
                    $this->$method($field, $value, $params);
                }
            }
        }

        public function validateName($name) {
            if (empty($name)) {
                $this->errors['name'] = 'Name is required';
            }
            if (strlen($name) < 2) {
                $this->errors['name'] = 'Name must be at least 2 characters long';
            }
        }

        public function validateLastName($lastName) {
            if (empty($lastName)) {
                $this->errors['lastName'] = 'Last name is required';
            }
            if (strlen($lastName) < 2) {
                $this->errors['lastName'] = 'Last name must be at least 2 characters long';
            }
        }

        public function validateEmail($email) {
            if (empty($email)) {
                $this->errors['email'] = 'Email is required';
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->errors['email'] = 'Invalid email';
            }
        }

        public function validatePassword($password) {
            if (empty($password)) {
                $this->errors['password'] = 'Password is required';
            }
            if (strlen($password) < 6) {
                $this->errors['password'] = 'Password must be at least 6 characters long';
            }
        }

        public function validateNumber($number) {
            if (empty($number)) {
                $this->errors['number'] = 'Number is required';
            }
            if (!preg_match('/^\d+$/', $number)) {
                $this->errors['number'] = 'Number must be a number';
            }
        }

        public function validateGender($gender) {
            if (empty($gender)) {
                $this->errors['gender'] = 'Gender is required';
            }
            if (!in_array($gender, ['male', 'female'])) {
                $this->errors['gender'] = 'Gender must be either "male" or "female"';
            }
        }

        public function validateAge($age) {
            if (empty($age)) {
                $this->errors['age'] = 'Age is required';
            }
            if (!preg_match('/^\d+$/', $age)) {
                $this->errors['age'] = 'Age must be a number';
            }
        }

        public function validateDateOfBirth($dateOfBirth) {
            if (empty($dateOfBirth)) {
                $this->errors['dateOfBirth'] = 'Date of birth is required';
            }
            if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $dateOfBirth)) {
                $this->errors['dateOfBirth'] = 'Date of birth must be in the format "YYYY-MM-DD"';
            } else {
                $date = new DateTime($dateOfBirth);
                if ($date >= new DateTime('today')) {
                    $this->errors['dateOfBirth'] = 'Date of birth must be in the past';
                }
            }
        }

        public function validateImage($image) {
            if (empty($image)) {
                $this->errors['image'] = 'Image is required';
            }
            if (!filter_var($image, FILTER_VALIDATE_URL)) {
                $this->errors['image'] = 'Image must be a valid URL';
            }
        }

        public function getErrors() {
            return $this->errors;
        }
    };

    

