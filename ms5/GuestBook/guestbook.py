import cgi
from google.appengine.api import users
import webapp2

MAIN_PAGE_HTML = """\
<html>
  <head>
      <title>all things c-ville</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
      <link href="http://plato.cs.virginia.edu/~np8bx/ms5/main.css" rel="stylesheet">
  </head>
  <body>
      <header>
       <div><h4><a href="http://plato.cs.virginia.edu/~np8bx/ms5/"> all things c-ville </a> - <a href ="http://plato.cs.virginia.edu/~np8bx/ms5/resturants.html">resturants </a>| vineyards | cafes </h4></div>
    </header>
    <div class="container">
"""

END_PAGE_HTML="""\
  
    <form action="/sign" method="post"  >
      <div><textarea class="form-control" name="content" rows="3" cols="30" placeholder="Enter content here"></textarea></div>
      <p></p>
      <div><input class="btn btn-primary pull-right" type="submit" value="Sign Guestbook"></div>
    </form>

    </div>
  </body>
</html>
"""
END_PAGE2_HTML="""\
    <form action="/sign" method="post"  >
      <div><textarea class="form-control" name="content" rows="3" cols="30" placeholder="Add more content here"></textarea></div>
      <p></p>
      <div><input class="btn btn-primary pull-right" type="submit" value="Sign Guestbook"></div>
    </form>

    </div>
  </body>
</html>
"""


class MainPage(webapp2.RequestHandler):
    def get(self):
      #checks for active Gogole account session
      user = users.get_current_user()
      if user:
        self.response.write(MAIN_PAGE_HTML)
        self.response.write('<h3>Hello ' + user.nickname() +': Welcome to our Guest Book!</h3>')
        self.response.write(END_PAGE_HTML)
      else:
        self.redirect(users.create_login_url(self.request.uri))
        
class Guestbook(webapp2.RequestHandler):
    def post(self):
        self.response.write(MAIN_PAGE_HTML)
        self.response.write('You wrote:<pre>')
        self.response.write(cgi.escape(self.request.get('content')))
        self.response.write('</pre>')
        self.response.write(END_PAGE2_HTML)

application = webapp2.WSGIApplication([
    ('/', MainPage),
    ('/sign', Guestbook),
], debug=True)
