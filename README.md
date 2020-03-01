<h1>"Job seek" (web app)</h1>
<h3>table of content</h3>
<p>-------------------------------------------------</p>
<a href="#intro">1. Introduction</a><br>
<a href="#guest">2. Guest page</a><br>
<a href="#auth">3. Authentication</a><br>
<a href="#job">4. Job/Search</a><br>
<a href="#user">5. User</a><br>
<a href="#linkedin">6. LinkedIn login/signup and share</a><br>
<a href="#api">7. API</a> <br>
<a href="#other">8. Other</a>
<p>-------------------------------------------------</p>
<h3 id="intro">Introduction</h3>
<p>"Job Seek" is a web application, it is designed by: PHP, HTML, CSS & Javascript, Laravel, Vue.JS, and JQuery.</p>
<p>"Job Seek" similar to Seek and Indeed, the website allows visitors to browse and search jobs. A user can sign up to create an account as a job seeker. As a job seeker the user can save jobs, create and send job applications. Job seekers can also edit personal profile to enter work experience, upload resumes and portfolios. A job seeker can also sign up using linkedin to create an account, and share a job to their linkedin acitivities via API integration. When a job seeker sends an application, the system will also send an email to the employer.</p>
<p>For test, I insert 50 fake jobs. don't care</p>

<p>-------------------------------------------------</p>
<br>
<h3>There is a dropdown buttonm, expand it and use functions.</h3>
<p>A user can also sign up as an employer. As an employer the user can create jobs, receive and view applications. Employers can also edit their company profile to upload a logo.</p>



<p>-------------------------------------------------</p>


<h3 id="guest">Guest page</h3>
<p>On guest page, users can look through 5 lastest pages(on home page), and all jobs information (after click job title).There is a navigation bar, which support guest go to other pages, such as jobs page, signup/login page. </p><br><br><h2>!!! If you want to use more useful functions, you must signup and verify your email.!!!</h2>

<p>-------------------------------------------------</p>

<h3 id="auth">Authentication</h3>
<p>support signup, login, remember me, email verified, login with linkedin. All users account are protected, for example, seeker account cannot login as employer account, and seeker A cannot view seeker B account page, etc. If you want to use all function, please verify email.</p>
<p>-----------------------------------------------</p>
<h3 id="user">User</h3>
<p>There are 4 roles, guest, seeker, linkedin user and employer.</p>
<p>Guest: you don't need to signup or anyother auth process, but limited functions available.</p>
<p>Seeker: you need sign up via "signup" button on the top of the page. When you sign up, name, email and other information is required, you need take care of the email address is unique, that's means you cannot signup multiple account under one email address. Please remeber, you need to verify email address. (after regiester, you will receive a confirm email.)</p>
<p>Linkedin user: when you login or signup, there is an option to use linkedin account, after click the button, you will redirect to linkedIn auth page. As LinkedIn user, you can share(post) any job you find from job seek to your linkedin activity.</p>
<p>Employer: for employers, when you sign up, you need tick "I am am employer" checkbox, after successfully regiester, you can use all functions in job seek, including post job, check applicants (who apply my job), edit profile......</p>
<p>employer account can switch to seeker mode when login the job seek.(untick the checkbox)</p>

<p>-------------------------------------------------------</p>

<h3 id="job">Job/search</h3>
<p>all users can view 5 latest jobs on home page, and can view all jobs via "job" link on nav bar. After click the job title, job detail page will show.</p>
<p>In each job card, there are 3 buttons(display only verify account email),save, share and apply. users can save job, all saved jobs will be recorded and users can check them. share button means users can share any job to linkedin acitivity, but this function only support linkedin user. apply button allow seekers apply job. after apply the job, a noticeable email will send to employer.</p>
<p>Search: you can find a search bar at top of the page, enter any job and search it. More, you can search by classification or type.</p>
<p>-------------------------------------------------</p>
<p><h3 id="linkedin">user can login, signup with linkedin account, and share post to linkedin activity. But linkedin user's email is un-verifyied in this app. sorry.</h3></p>

<p>------------------------------------------------</p>
<h3>API</h3>
<p>I have built api, support create, read, update, delete (CRUD) jobs, but I set only employer can use create api.</p>
<p>-------------------------------------------------</p>
<h3 id="other">until now, there are all main functions, other functions such as edit profile, upload logo also available. I have try my best to debug, and confrim all functions are availale. If you find any error, dont' hesitate contact me. My gmail: bochuanzhu1992@gmail.com </h3>
