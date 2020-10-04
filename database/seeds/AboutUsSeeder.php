<?php

use Illuminate\Database\Seeder;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aboutUs = array(
            array(
                'title' => 'Lorem ipsum dolor sit amet, consectetur',
                'description' => '<h3>Avoiding Common Errors in Form I-9 Compliance, Storage, Destruction, Making Corrections,
                                and Review of Documents</h3>
                            <p>The Form I-9 is frequently referred to as "the most complicated two page form in
                                America." The Form I-9 has 15 pages of instructions and a 69-page handbook that provides
                                details on how to properly complete the Form I-9. In addition, there is an entire body
                                of case law related to Form I-9 compliance.</p>
                            <p>As the fines for a mistake in a Form I-9 can be as high as $2,156 per Form I-9 for a
                                first offense, an employer subject to a Form I-9 audit can be looking at fines in the
                                tens, and sometimes hundreds of thousands of dollars. Finding the answers to Form I-9
                                questions can be challenging and the information can be confusing.</p>
                            <p>In this webinar, expert speaker Matthew Burr will explore some of the more complex areas
                                of I-9 compliance and how to resolve the challenges that many companies face with
                                respect to Form I-9 compliance. In addition to addressing some of the most common issues
                                that employers face with Form I-9 compliance, this session will also have a question and
                                answer period so you can get answers to your Form I-9 questions.</p>
                            <h3>Brief Description</h3>
                            <ul>
                                <li>This training will focus on the importance of I-9 compliance for small businesses.
                                </li>
                                <li>The training will introduce the I-9 forms, importance of filling out the forms
                                    correctly, retention process and proactive I-9 audits.
                                </li>
                                <li>We will also discuss common mistakes and how to correct.</li>
                                <li>We will review the area\'s I find important with I-9\'s and how to prevent future
                                    issues.
                                </li>
                            </ul>
                            <h3>Session Highlights</h3>
                            <ul>
                                <li>Review of common compliance errors that companies make in the Form I-9</li>
                                <li>Steps every company can take to make certain that they can avail themselves of the
                                    good faith defense if their Form I-9s are audited by Immigration
                                </li>
                                <li>How to handle review of documents presented in the Form I-9 process</li>
                                <li>How to properly make corrections to the Form I-9</li>
                                <li>Storage and destruction requirements for Form I-9</li>
                                <li>Best practices for document review in the Form I-9 process</li>
                            </ul>
                            <h3>Why You Should Attend</h3>
                            <ul>
                                <li>Get detailed information about Form I-9</li>
                                <li>Update your knowledge on Legal Information about Form I-9</li>
                                <li>Get to know the Importance of Mistake Proof Forms</li>
                                <li>Updates on Retention Process</li>
                                <li>Learn Proactive Audits</li>
                                <li>Find the Common Mistakes and how you can correct them</li>
                                <li>Why it is important for your business</li>
                                <li>Impact and cost for an organization with and without Form I-9</li>
                                <li>Detailed updates on Upcoming or potential changes in From I-9.</li>
                            </ul>
                            <h3>Who Should Attend</h3>
                            <ul>
                                <li>Human Resources Professionals</li>
                                <li>Small Business Owners</li>
                                <li>Non-Profit Administrators</li>
                                <li>General Managers</li>
                                <li>Office Managers</li>
                                <li>Payroll Professionals</li>
                                <li>Lawmakers</li>
                                <li>Attorneys</li>
                                <li>Accounting Professionals</li>
                                <li>Consultants</li>
                                <li>Labor Unions</li>
                                <li>Professors, Instructors and Trainers</li>
                            </ul>',
                'image' => 'about/about-img.png',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            )
        );

        \App\Models\AboutUs::insert($aboutUs);
    }
}
