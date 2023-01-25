
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Subject <span class="required">*</span></label>
                                <div class="text2{{ $errors->has('subject') ? ' has-error' : '' }}">
                                    <input name="subject" type="text" class="form-control" id="subject" placeholder="Enter subject" />
                                    @if ($errors->has('subject'))
                                        <span class="help-block">
                                              <strong>{{ $errors->first('subject') }}</strong>
                                             </span>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name">Your Name <span class="required">*</span></label>
                                <div class="text2{{ $errors->has('contact_name') ? ' has-error' : '' }}">
                                    <input name="contact_name" type="text" class="form-control" id="name" placeholder="Enter your name" />
                                        @if ($errors->has('contact_name'))
                                            <span class="help-block">
                                              <strong>{{ $errors->first('contact_name') }}</strong>
                                             </span>
                                        @endif

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">
                                   Your Email <span class="required">*</span></label>
                                <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-envelope"></span>
                                </span>
                                    <div class="text2{{ $errors->has('contact_email') ? ' has-error' : '' }}">
                                    <input name="contact_email"  type="email" class="form-control" id="email" placeholder="Enter your email" />
                                        @if ($errors->has('contact_email'))
                                            <span class="help-block">
                                              <strong>{{ $errors->first('contact_email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="country">
                                    Your Country <span class="required">*</span></label>

                                    <div class="text2{{ $errors->has('country_id') ? ' has-error' : '' }}">
                                        <select class="form-control" name="country_id" required>
                                            <option>select country</option>
                                            @foreach($countries as $country)
                                                <option value="{{$country->id}}" @if(isset($contact))@if($country->id ==$contact->country_id ) selected @endif @endif>{{ucwords($country->name)}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('country_id'))
                                            <span class="help-block">
                                              <strong>{{ $errors->first('country_id') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">
                                    Message <span class="required">*</span></label>
                                <div class="text2{{ $errors->has('contact_message') ? ' has-error' : '' }}">
                                      <textarea name="contact_message" id="message" class="form-control" rows="12" cols="25"
                                          placeholder="Message"></textarea>
                                    @if ($errors->has('contact_message'))
                                        <span class="help-block">
                                              <strong>{{ $errors->first('contact_message') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="banner_btn pull-right" id="btnContactUs">
                                Send Message</button>
                        </div>
                    </div>
