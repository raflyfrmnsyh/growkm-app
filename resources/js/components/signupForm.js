
export default function signupForm() {
    return {
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
        errors: {},
        submit() {
            this.errors = {};
            if (!this.name) this.errors.name = 'Name is required';
            if (!this.email) this.errors.email = 'Email is required';
            if (!this.password) this.errors.password = 'Password is required';
            if (this.password !== this.password_confirmation) {
                this.errors.password_confirmation = 'Passwords do not match';
            }
            if (Object.keys(this.errors).length === 0) {
                console.log('Sign Up Success:', {
                    name: this.name,
                    email: this.email,
                    password: this.password,
                });
            }
        }
    }
}
