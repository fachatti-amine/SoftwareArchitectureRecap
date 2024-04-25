### What are the two conditions required for you to use the facade design pattern?
- You need to simplify the interaction with your subsystem for client classes.
- You need a class to act as an interface between your subsystem and a client class.

While the facade design pattern uses a number of different design principles, its purpose is to provide ease of access 
to a complex subsystem. This is done by encapsulating the subsystem classes into a Facade class, and then hiding them 
from the client classes so that the clients do not know about the details of the subsystem.


#### summarize
The facade design pattern is a means to hide the complexity of
a subsystem by encapsulating it behind a unifying wrapper called a facade class;
removes the need for client classes to manage a subsystem on their own,
resulting in less coupling between the subsystem and the client classes;
handles instantiation and redirection of
tasks to the appropriate class within the subsystem;
provides client classes with a simplified interface for the subsystem;
acts simply as a point of entry to a subsystem and
does not add more functionality to the subsystem