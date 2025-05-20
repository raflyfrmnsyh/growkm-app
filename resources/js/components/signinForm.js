
export default function signinForm() {
    return {
        email: '',
        password: '',
        errors: {},
        submit() {
            this.errors = {};
            if (!this.email) this.errors.email = 'Email is required';
            if (!this.password) this.errors.password = 'Password is required';
            if (Object.keys(this.errors).length === 0) {
                console.log('Sign In Success:', {
                    email: this.email,
                    password: this.password,
                });
            }
        }
    }
}
