from flask import Flask, render_template, request, redirect, url_for

app = Flask(__name__)

# In-memory storage for job vacancies (in a real application, you'd use a database)
job_vacancies = []

# Route to render the main page with job listings
@app.route('/')
def index():
    return render_template('index.html', job_vacancies=job_vacancies)

# Route for the control panel to add/remove jobs
@app.route('/control-panel', methods=['GET', 'POST'])
def control_panel():
    if request.method == 'POST':
        # Adding a new job post
        title = request.form.get('title')
        icon = request.form.get('icon')
        key_requirements = request.form.get('key_requirements').splitlines()
        qualifications = request.form.get('qualifications').splitlines()
        location = request.form.get('location')

        new_job = {
            'title': title,
            'icon': icon,
            'key_requirements': key_requirements,
            'qualifications': qualifications,
            'location': location
        }
        job_vacancies.append(new_job)
        return redirect(url_for('control_panel'))
    
    return render_template('control_panel.html', job_vacancies=job_vacancies)

# Route to remove a job post
@app.route('/remove-job/<int:index>', methods=['POST'])
def remove_job(index):
    if 0 <= index < len(job_vacancies):
        del job_vacancies[index]
    return redirect(url_for('control_panel'))

# Serve CSS file from the same directory
@app.route('/output.css')
def serve_css():
    return app.send_static_file('output.css')

if __name__ == '__main__':
    app.run(debug=True)
