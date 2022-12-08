FROM ubuntu:16.04
RUN sed -i 's/archive.ubuntu.com/tw.archive.ubuntu.com/g' \
    /etc/apt/sources.list
RUN apt update 
RUN apt-get install wget unzip zip net-tools -y
RUN wget https://onboardcloud.dl.sourceforge.net/project/xampp/XAMPP%20Linux/8.1.12/xampp-linux-x64-8.1.12-0-installer.run
RUN chmod +x xampp-linux-x64-8.1.12-0-installer.run
RUN ./xampp-linux-x64-8.1.12-0-installer.run
RUN rm xampp-linux-x64-8.1.12-0-installer.run
RUN mv /opt/lampp/etc/extra/httpd-xampp.conf /opt/lampp/etc/extra/httpd-xampp.conf.bak
RUN echo "export PATH=\$PATH:/opt/lampp/bin/" >> /root/.bashrc
RUN echo "export TERM=dumb" >> /root/.bashrc
ADD httpd-xampp.conf /opt/lampp/etc/extra/httpd-xampp.conf
VOLUME  ["/opt/lampp/htdocs/"]
EXPOSE 80 443 3306
CMD /opt/lampp/lampp start && tail -F /opt/lampp/logs/error_log
